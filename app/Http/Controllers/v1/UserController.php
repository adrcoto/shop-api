<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Role;
use App\Services\EmailService;
use App\User;
use GenTux\Jwt\JwtToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Services\BaseService;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\v1
 */
class UserController extends Controller
{

    /**
     * Login User
     *
     * @param Request $request
     * @param User $userModel
     * @param JwtToken $jwtToken
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request, User $userModel, JwtToken $jwtToken)
    {
        try {
            $rules = [
                'email' => 'bail|required|email',
                'password' => 'required|min:6'
            ];

            $message = [
                'email.required' => 'Introduceți o adresă de e-mail',
                'email.email' => 'Adresa de e-mail trebuie să fie validă',
                'password.required' => 'Introduceți o parolă',
                'password.min' => 'Parola trebuie să conțină minim 6 caractere'
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = $userModel->login($request->email, $request->password);

            if (!$user) {
                return $this->returnNotFound('Email sau parola greșite');
            }

            if ($user->status !== '1') {
                return $this->returnError('Contul dumneavoastră incă nu este activat');
            }

            $token = $jwtToken->createToken($user);

            $data = [
                'user' => $user,
                'jwt' => $token->token()
            ];

            return $this->returnSuccess($data);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Get logged user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        try {
            $user = $this->validateSession();

            return $this->returnSuccess($user);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Register user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        try {
            $rules = [
                'name' => 'bail|required|max:26',
                'email' => 'bail|required|email|unique:users',
                'password' => 'required|min:6',
            ];

            $message = [
                'name.required' => 'Introduceți un nume',
                'name.max' => 'Numele este prea lung',
                'email.required' => 'Introduceți o adresă de e-mail',
                'email.email' => 'Adresa de e-mail trebuie să fie validă',
                'email.unique' => 'Există deja un utilizator cu această adresă de e-mail',
                'password.required' => 'Introduceți o parolă',
                'password.min' => 'Parola trebuie să conțină minim 6 caractere'
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = str_random(128);
            $user->role_id = Role::ROLE_USER;

            $user->save();

            $url = $request->url;
            $emailService = new EmailService();
            $emailService->sendVerifyAccount($user, $url);

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Verify account
     * @param Request $request
     * @param User $userModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request, User $userModel)
    {
        try {
            $rules = [
//                'email' => 'required|email|exists:users',
                'code' => 'required|min:128|max:128'
            ];

            $message = [
                'code.required' => 'Cod inexistent',
                'code.min' => 'Cod invalid',
                'code.max' => 'Cod invalid'
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if (!$validator->passes())
                return $this->returnError($validator->errors()->first());


//            $user = $userModel::where('email', $request->email)->get()->first();
            $user = $userModel::where('status', $request->code)->get()->first();

            if (!$user)
                return $this->returnNotFound('Contul este deja activat');

//            if ($user->status != $request->code)
//                return $this->returnError('Invalid code');

            $user->status = '1';

            $user->save();

            return $this->returnSuccess();

        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Forgot password
     * @param Request $request
     * @param User $userModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function forgotPassword(Request $request, User $userModel)
    {
        try {
            $rules = [
                'email' => 'required|email|exists:users'
            ];

            $messages = [
                'email.required' => 'Introduceți o adresă de e-mail',
                'email.email' => 'Adresa de e-mail trebuie să fie validă',
                'email.exists' => 'Nu există nici un cont asociat adresei de e-mail introdusă',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = $userModel::where('email', $request->email)->first();

            $user->forgot_code = strtoupper(str_random(6));
            $user->save();

            $emailService = new EmailService();
            if ($request->has('change'))
                $emailService->sendChangePassword($user);
            else
                $emailService->sendForgotPassword($user);

            return $this->returnSuccess($request->all());
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Change user password
     * @param Request $request
     * @param User $userModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request, User $userModel)
    {
        try {
            $rules = [
                'email' => 'bail|required|email|exists:users',
                'code' => 'bail|required',
                'password' => 'bail|required|min:6',
            ];

            $messages = [
                'email.required' => 'Introduceți o adresă de e-mail',
                'email.email' => 'Adresa de e-mail trebuie să fie validă',
                'code.required' => 'Introduceți codul trimis pe e-mail',
                'password.required' => 'Introduceți o nouă parolă',
                'password.min' => 'Parola trebuie să conțină minim 6 caractere'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = $userModel::where('email', $request->email)->where('forgot_code', $request->code)->get()->first();

            if (!$user) {
                return $this->returnNotFound('Codul nu este valid');
            }

            $user->password = Hash::make($request->password);
            $user->forgot_code = '';

            $user->save();

            return $this->returnSuccess($request->all());
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }


    /**
     * Update logged user
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            $rules = [
                'name' => 'bail|max:26',
                'password' => 'bail|min:6',
                'phone' => 'min:6',
            ];
            $message = [
                'name.max' => 'Numele este prea lung',
                'password' => 'Parola trebuie să conțină minim 6 caracter',
                'phone.min' => 'Introduceți un număr de telefon valid'
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }


            $user = $this->validateSession();

            if ($request->has('name'))
                $user->name = $request->name;

            if ($request->has('password'))
                $user->password = Hash::make($request->password);

            if ($request->has('phone'))
                $user->phone = $request->phone;

            if ($request->has('location'))
                $user->location = $request->location;


            $user->save();
            return $this->returnSuccess($request->all());
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    public function updateAvatar(Request $request)
    {

        try {

            $rules = [
                'avatar' => 'required|image',
            ];
            $messages = [
                'avatar.required' => 'Alegeți o fotografie',
                'avatar.image' => 'Fotografia nu este suportată'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = $this->validateSession();


            if ($request->has('avatar')) {

                /*        if ($user->avatar == null) {
                            $user->avatar = $request->avatar->store('avatars', 'public');
                        } else {
                            Storage::disk('public')->delete($user->avatar);

                            $user->avatar = $request->avatar->store('avatars', 'public');
                        }*/

                $baseService = new BaseService();

                $picture = $request->file('avatar');
                $pictureExtension = $picture->getClientOriginalExtension();
                $generatedPictureName = str_replace(' ', '_', $user->name) . '_' . time() . '.' . $pictureExtension;
                $path = 'storage/users/';
                File::makeDirectory($path, 0777, true, true);


                if ($user->avatar == null) {
                    $pictureData = $baseService->processImage($path, $picture, $generatedPictureName);

                    $user->avatar = json_decode($pictureData);
                } else {
                    File::delete($user->avatar);
                    $pictureData = $baseService->processImage($path, $picture, $generatedPictureName);
                    $user->avatar = json_decode($pictureData);
                }


                $user->save();
            }
            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnBadRequest($e->getMessage());
        }
    }
}