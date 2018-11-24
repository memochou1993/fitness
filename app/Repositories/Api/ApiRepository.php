<?php

namespace App\Repositories\Api;

use Request;
use App\Repositories\Repository;

class ApiRepository extends Repository
{
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

        $this->with = (string) Request::input('with');

        $this->per_page = (int) Request::input('per_page');
    }
}
