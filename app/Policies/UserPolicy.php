<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
public function edit(User $curentUser,User $user){
    return $curentUser->is($user);
}
}