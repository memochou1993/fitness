<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\ItemCollection as Collection;
use App\Contracts\Api\V1\ItemInterface as Repository;

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
    public function __construct(Repository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\Collection
     */
    public function show($item_key)
    {
        return new Collection($this->repository->getItem($item_key));
    }
}
