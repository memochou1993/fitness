<?php

namespace App\Repositories\Api\V1;

use App\Item;
use App\Contracts\Api\V1\ItemInterface;
use App\Repositories\Api\ApiRepository;

class ItemRepository extends ApiRepository implements ItemInterface
{
    /**
     *
     */
    protected $item;

    /**
     *
     *
     *
     */
    public function __construct(Item $item)
    {
        parent::__construct();

        $this->item = $item;
    }

    /**
     *
     *
     *
     */
    public function getAllItems()
    {
        return $this->item->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getItem($item_key)
    {
        return $this->item->where('key', $item_key)->paginate($this->per_page);
    }
}
