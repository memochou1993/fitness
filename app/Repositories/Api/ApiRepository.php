<?php

namespace App\Repositories\Api;

use App;
use Auth;
use App\User;
use App\Repositories\Repository;

class ApiRepository extends Repository
{
    /**
     *
     */
    protected $user;

    /**
     *
     *
     *
     */
    public function __construct()
    {
        $this->user = App::environment('local') ? User::find(1) : Auth::user();
    }
}
