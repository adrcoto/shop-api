<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailService
 *
 * @package App\Services
 */
class EmailService
{
    /**
     * Send code on email for forgot password
     *
     * @param User $user
     */
    public function sendForgotPassword(User $user)
    {
        Mail::send('emails.forgot', ['user' => $user], function ($message) use ($user) {
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->subject(env('MAIL_APP_NAME'). ' - Forgot password code');

            $message->to($user->email);
        });
    }

    /**
     * Send  email for verifying accunt
     * @param User $user
     * @param string $url
     */
    public function sendVerifyAccount(User $user, string $url){
        Mail::send('emails.verify', ['user' => $user, 'url' => $url], function($message) use ($user){
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->subject(env('MAIL_APP_NAME'). ' - Verify your account');

            $message->to($user->email);
        });
    }

}