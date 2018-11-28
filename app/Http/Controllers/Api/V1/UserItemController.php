<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Response;
use App\Http\Resources\UserItemCollection;
use App\Contracts\Api\V1\UserItemInterface;
use App\Http\Controllers\Api\ApiController;

class UserItemController extends ApiController
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
    public function __construct(UserItemInterface $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserItemCollection
     */
    public function index()
    {
        try {
            return new UserItemCollection($this->repository->getAllItems());
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->user_items->storeItems();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\UserItemCollection
     */
    public function show($item_key)
    {
        try {
            return new UserItemCollection($this->repository->getItem($item_key));
        } catch (\Exception $e) {
            return Response::error($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $item_id
     * @return \Illuminate\Http\Response
     */
    public function update($item_id)
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
