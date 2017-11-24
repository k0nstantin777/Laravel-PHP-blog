<?php

namespace App\Listeners;

use App\Events\FeedbackCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class FeedbackDbSave
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
        return Message::create([
            'name' => $event->inputData['name'],
            'subject' => $event->inputData['subject'],
            'message' => $event->inputData['message'],
            'email' => $event->inputData['email'],
            'user_id' => Auth::user() ? Auth::user()->id : null
        ]);
    }
}
