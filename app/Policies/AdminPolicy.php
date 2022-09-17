<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function admin($user) { return $this->isAdmin($user); }

    protected function isAdmin($user) {
        if ($user->role->name == 'admin') {
            return true;
        }
        return false;
    }

}
