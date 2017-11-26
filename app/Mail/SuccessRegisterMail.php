<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $input;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.success_register')
            ->subject('Регистрация на сайте '.env('APP_NAME', route('mainPage')))
            ->with(['data' => $this->input]);
    }
}
