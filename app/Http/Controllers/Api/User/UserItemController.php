<?php

namespace App\Http\Controllers\Api\User;

use App\Contracts\UserItemInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserItemResource;
use Illuminate\Http\Request;

class UserItemController extends Controller
{
    protected $request;
    protected $user_item;

    /**
     *
     *
     *
     */
    public function __construct(Request $request, UserItemInterface $user_item)
    {
        $this->request = $request;
        $this->user_item = $user_item;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user_items = $this->user_item->getUserItemsByUserId($user_id);

        return UserItemResource::collection($user_items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
