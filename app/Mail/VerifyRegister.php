<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyRegister extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function build(): VerifyRegister
    {
        $token = $this->user->verifyEmail()->first()->token;

        return $this->view('front.email.verify_register', compact('token'));
    }
}
