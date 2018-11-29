<?php

namespace App\Repositories\Api;

use App;
use Auth;
use Request;
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
     */
    protected $with;

    /**
     *
     */
    protected $per_page;

    /**
     *
     *
     *
     */
    public function __construct()
    {
        parent::__construct();

        $this->user = (! App::environment('local')) ? Auth::user() : User::find(1);

        $this->with = (! Request::input('with')) ? null : explode(',', Request::input('with'));

        $this->per_page = Request::input('per_page');
    }
}
