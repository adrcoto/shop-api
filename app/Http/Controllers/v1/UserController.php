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

            $validator = Validator::make($request->all(), $rules);

            if (!$validator->passes()) {
                return $this->returnBadRequest('Please fill all required fields');
            }

            $user = $userModel::where('email', $request->email)->first();

            $user->forgot_code = strtoupper(str_random(6));
            $user->save();

            $emailService = new EmailService();
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
                'email' => 'required|email|exists:users',
                'code' => 'required',
                'password' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if (!$validator->passes()) {
                return $this->returnBadRequest('Please fill all required fields');
            }

            $user = $userModel::where('email', $request->email)->where('forgot_code', $request->code)->get()->first();

            if (!$user) {
                $this->returnNotFound('Code is not valid');
            }

            $user->password = Hash::make($request->password);
            $user->forgot_code = '';

            $user->save();

            return $this->returnSuccess();
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
                'password' => 'min:6'
            ];
            $message = [
                'name.max' => 'Numele este prea lung',
                'password' => 'Parola trebuie să conțină minim 6 caracter'
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
            return $this->returnSuccess($user);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage());
        }
    }
}