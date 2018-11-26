<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\UserItemResource;
use App\Contracts\Api\V1\UserItemInterface;
use App\Http\Controllers\Api\ApiController;

class UserItemController extends ApiController
{
    /**
     *
     */
    protected $user_items;

    /**
     *
     *
     *
     */
    public function __construct(UserItemInterface $user_items)
    {
        parent::__construct();

        $this->user_items = $user_items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\UserItemResource
     */
    public function index()
    {
        return UserItemResource::collection(
            $this->user_items->getAllItems()
        );
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
     * Display the specified resource.
     *
     * @param  string  $item_key
     * @return \App\Http\Resources\UserItemResource
     */
    public function show($item_key)
    {
        return UserItemResource::collection(
            $this->user_items->getItem($item_key)
        );
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
