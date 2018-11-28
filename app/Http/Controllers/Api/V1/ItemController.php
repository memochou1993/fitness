<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ItemCollection;
use App\Contracts\Api\V1\ItemInterface;
use App\Http\Controllers\Api\ApiController;

class ItemController extends ApiController
{
    /**
     *
     */
    protected $repository;

    /**
     *
     *
     *
     */
    public function __construct(ItemInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\ItemCollection
     */
    public function show($item_key)
    {
        return new ItemCollection($this->repository->getItem($item_key));
    }
}
