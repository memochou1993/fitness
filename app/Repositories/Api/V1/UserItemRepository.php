<?php

namespace App\Repositories\Api\V1;

use App\User;
use App\Repositories\Api\ApiRepository;
use App\Contracts\Api\V1\UserItemInterface;

class UserItemRepository extends ApiRepository implements UserItemInterface
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
    public function getAllItems($user_key)
    {
        return $this->user->where('key', $user_key)->first()->items()->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getItem($user_key, $item_key)
    {
        return $user = $this->user->where('key', $user_key)->first()->items()->where('key', $item_key)->paginate($this->per_page);
    }
}
