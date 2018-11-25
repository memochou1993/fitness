<?php

namespace App\Repositories\Api\V1;

use App\Contracts\Api\V1\UserInterface;
use App\Repositories\Api\ApiRepository;

class UserRepository extends ApiRepository implements UserInterface
{
    /**
     *
     *
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     *
     *
     */
    public function getUser()
    {
        return $this->user;
    }
}
