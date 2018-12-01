<?php

namespace App\Policies;

use App;
use Auth;
use App\User;
use App\UserItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserItemPolicy
{
    use HandlesAuthorization;

    /**
     *
     */
    protected $user;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = (! App::environment('local')) ? Auth::user() : User::find(config('seeds.users.id'));
    }

    /**
     * Determine if the given item can be updated by the user.
     *
     * @param  \App\UserItem  $user_item
     * @return bool
     */
    public function update(User $user, UserItem $user_item)
    {
        return $this->user->id === $user_item->user_id;
    }
}
