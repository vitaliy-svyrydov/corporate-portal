<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->canDo('EDIT_USERS');
    }

    public function edit(User $user)
    {
        return $user->canDo('EDIT_USERS');
    }
}
