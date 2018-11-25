<?php

namespace App\Repositories\Api\V1;

use App\Repositories\Api\ApiRepository;
use App\Contracts\Api\V1\UserItemInterface;

class UserItemRepository extends ApiRepository implements UserItemInterface
{
    /**
     *
     *
     *
     */
    public function getAllItems()
    {
        return $this->user->items()->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getItem($item_key)
    {
        return $this->user->items()->where('key', $item_key)->paginate($this->per_page);
    }
}
