<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\ItemResource as Resource;
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
     * @return \App\Http\Resources\Resource
     */
    public function show($item_key)
    {
        return Resource::collection($this->repository->getItem($item_key));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $item_key
     * @return \Illuminate\Http\Response
     */
    public function update($item_key)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $item_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item_id)
    {
        //
    }
}
