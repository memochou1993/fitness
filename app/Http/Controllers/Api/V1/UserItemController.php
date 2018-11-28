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
     * @return \App\Http\Resources\UserItemCollection
     */
    public function index()
    {
        try {
            return new UserItemCollection($this->user_items->getAllItems());
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
        //
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
            return new UserItemCollection($this->user_items->getItem($item_key));
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
