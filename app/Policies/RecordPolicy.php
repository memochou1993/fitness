<?php

namespace App\Policies;

use App;
use Auth;
use App\User;
use App\Record;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecordPolicy
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
     * @param  \App\Record  $record
     * @return bool
     */
    public function update(User $user, Record $record)
    {
        return $this->user->id === $record->user_id;
    }
}
