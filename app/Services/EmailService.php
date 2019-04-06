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
     * Send cond on email for verifying accunt
     * @param User $user
     */
    public function sendVerifyAccount(User $user){
        Mail::send('emails.verify', ['user' => $user], function($message) use ($user){
            $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $message->subject(env('MAIL_APP_NAME'). ' - Verify your account');

            $message->to($user->email);
        });
    }

}