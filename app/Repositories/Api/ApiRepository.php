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

        $this->user = (! App::environment('local')) ? Auth::user() : User::find(config('seeds.users.id'));

        $this->castParams();
    }

    protected function castParams()
    {
        $this->with = (! Request::input('with')) ? null : explode(',', Request::input('with'));

        $this->per_page = (int) Request::input('per_page');
    }
}
