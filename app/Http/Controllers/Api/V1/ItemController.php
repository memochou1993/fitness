<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ItemInterface;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     *
     */
    protected $item_interface;

    /**
     *
     *
     *
     */
    public function __construct(ItemInterface $item_interface)
    {
        $this->item_interface = $item_interface;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->item_interface->getItemsByUser();
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
    public function show($item_key)
    {
        return $this->item_interface->getItemsByItemKey($item_key);
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
