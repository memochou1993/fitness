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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserItemResource::collection(
            $this->user_items->getAllItems()->paginate($this->per_page)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_key, $item_key)
    {
        return UserItemResource::collection(
            $this->user_items->getItem($item_key)->paginate($this->per_page)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
