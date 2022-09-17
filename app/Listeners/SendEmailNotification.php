<?php

namespace App\Listeners;

use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        $name = $event->user->name;
        $username = $event->user->login;
        $log = new Log;
        $log->name = $name;
        $log->login = $username;
        $log->ip = $this->request->getClientIp();
        $log->save();

    }
}
