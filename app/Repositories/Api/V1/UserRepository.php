<?php

namespace App\Repositories\Api\V1;

use App\User;
use App\Contracts\Api\V1\UserInterface;
use App\Repositories\Api\ApiRepository;

class UserRepository extends ApiRepository implements UserInterface
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
    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     *
     *
     *
     */
    public function getAllUsers()
    {
        return $this->user->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getUser($user_key)
    {
        $user = $this->user->where('key', $user_key);

        if ($this->with) {
            $user->with(explode(',', $this->with));
        }

        return $user->paginate($this->per_page);
    }
}
