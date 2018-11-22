<?php

namespace App\Repositories\Api\V1;

use App\Item;
use App\Contracts\Api\V1\ItemInterface;
use App\Repositories\Api\ApiRepository;

class ItemRepository extends ApiRepository implements ItemInterface
{
    /**
     *
     *
     *
     */
    public function getAllItems($item_key)
    {
        return Item::where('key', $item_key);
    }
}
