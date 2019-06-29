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


            $messages = [
                'name.required' => 'name',
                'name.max' => 'name.max',
                'email.required' => 'email',
                'email.email' => 'email.email',
                'email.unique' => 'email.unique',
                'password.required' => 'password',
                'password.min' => 'password.min'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = str_random(128);
            $user->role_id = Role::ROLE_USER;

            $url = $request->url;
            $emailService = new EmailService();

            if ($emailService->sendVerifyAccount($user, $url))
                $user->save();

            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError('General error');
        }
    }

    /**
     * Login User
     * @param Request $request
     * @param User $userModel
     * @param JwtToken $jwtToken
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request, User $userModel, JwtToken $jwtToken)
    {
        try {
            $rules = [
                'email' => 'bail|required|email',
                'password' => 'required|min:6'
            ];

            $messages = [
                'email.required' => 'email',
                'email.email' => 'email.email',
                'email.unique' => 'email.unique',
                'password.required' => 'password',
                'password.min' => 'password.min'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = $userModel->login($request->email, $request->password);

            if (!$user) {
                return $this->returnNotFound('user.404');
            }

            if ($user->status !== '1') {
                return $this->returnError('user.unactivated');
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendVerificationEmail(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email|exists:users',
            ];

            $messages = [
                'email.required' => 'email',
                'email.email' => 'email.email',
                'email.exists' => 'email.exists',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = User::where('email', $request->email)->first();

            if (!$user)
                $this->returnNotFound('user.404');

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
                'email' => 'required|email|exists:users',
                'code' => 'required|min:128|max:128'
            ];

            $messages = [
                'email.required' => 'email',
                'email.email' => 'email.email',
                'email.exists' => 'email.exists',
                'code.required' => 'code',
                'code.min' => 'code.min',
                'code.max' => 'code.max'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes())
                return $this->returnError($validator->errors()->first());


            $user = $userModel::where('email', $request->email)->get()->first();

            if (!$user)
                return $this->returnNotFound('user.404');

            if ($user->status == User::STATUS_ACTIVE)
                return $this->returnError('user.activated');

            if ($user->status != $request->code)
                return $this->returnError('code.min');

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
                'email.required' => 'email',
                'email.email' => 'email.email',
                'email.exists' => 'email.exists',
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

            return $this->returnSuccess();
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
                'email.required' => 'email',
                'email.email' => 'email.email',
                'email.exists' => 'email.exists',
                'code.required' => 'code',
                'password.required' => 'password',
                'password.min' => 'password.min',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if (!$validator->passes()) {
                return $this->returnError($validator->errors()->first());
            }

            $user = $userModel::where('email', $request->email)->first();

            if (!$user) {
                return $this->returnNotFound('user.404');
            }

            if ($user->forgot_code != $request->code) {
                return $this->returnError('code.min');
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

            $messages = [
                'name.max' => 'name.max',
                'password.min' => 'password.min',
                'phone.min' => 'phone.min'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

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
            return $this->returnSuccess();
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }

    /**
     * Update user picture
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAvatar(Request $request)
    {
        try {

            $rules = [
                'avatar' => 'required|image',
            ];

            $messages = [
              'avatar.required' => 'avatar',
              'avatar.image' => 'avatar.image',
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