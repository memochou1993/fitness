<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ItemResource;
use App\Contracts\Api\V1\ItemInterface;
use App\Http\Controllers\Api\ApiController;

class ItemController extends ApiController
{
    /**
     *
     */
    protected $items;

    /**
     *
     *
     *
     */
    public function __construct(ItemInterface $items)
    {
        parent::__construct();

        $this->items = $items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\ItemResource
     */
    public function index()
    {
        return ItemResource::collection(
            $this->items->getAllItems()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\ItemResource
     */
    public function show($item_key)
    {
        return ItemResource::collection(
            $this->items->getItem($item_key)
        );
    }
}
