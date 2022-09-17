<?php

namespace App\Listeners;

use App\Log;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Jenssegers\Agent\Agent;


class loginListener
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
        $agent = new Agent();
        $name = $event->user->first_name." ".$event->user->last_name;
        $username = $event->user->login;
        $log = new Log;
        $log->name = $name;
        $log->login = $username;
        $log->kind = 1;
        $log->ip = $this->request->getClientIp();
        $log->device = $agent->device();
        $log->browser = $agent->browser();
        $log->platform = $agent->platform();
        $log->save();
    }
}
