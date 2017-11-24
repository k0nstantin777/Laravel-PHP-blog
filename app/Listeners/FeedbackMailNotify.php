<?php

namespace App\Listeners;

use App\Events\FeedbackCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackMailNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FeedbackCreated  $event
     * @return void
     */
    public function handle(FeedbackCreated $event)
    {
        Mail::to(env('MAIL_TO'))
            ->send(new FeedbackMail($event->inputData));
    }
}
