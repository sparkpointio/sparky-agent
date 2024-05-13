<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->email;
        $token = Str::random(60);
        $createdAt = now();

        if (DB::table('password_reset_tokens')->where('email', $email)->exists()) {
            DB::table('password_reset_tokens')
                ->where('email', $email)
                ->update([
                    'token' => $token,
                    'created_at' => $createdAt,
                ]);
        } else {
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => $createdAt,
            ]);
        }

        $url = URL::temporarySignedRoute(
            'password.reset',
            now()->addMinutes(60),
            ['token' => $token, 'email' => $email]
        );

        return $this->view('emails.resetPassword')
            ->with([
                'url' => $url,
            ])
            ->subject('Reset Password Notification');
    }
}
