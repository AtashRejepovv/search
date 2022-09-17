<?php

namespace App\Listeners;

use App\Log;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Jenssegers\Agent\Agent;

class LoginAttemptListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(Failed  $event)
    {
        $agent = new Agent();
        $username = $event->credentials['login'];
        $log = new Log;
        $log->name = NULL;
        $log->login = $username;
        $log->kind = 3;
        $log->ip = $this->request->getClientIp();
        $log->device = $agent->device();
        $log->browser = $agent->browser();
        $log->platform = $agent->platform();
        $log->save();
    }
}
