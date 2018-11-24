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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemResource::collection(
            $this->items->getAllItems()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $item_key
     * @return \Illuminate\Http\Response
     */
    public function show($item_key)
    {
        return ItemResource::collection(
            $this->items->getItem($item_key)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
