<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Contracts\ItemInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    /**
     *
     */
    protected $request;

    /**
     *
     */
    protected $item_interface;

    /**
     *
     *
     *
     */
    public function __construct(Request $request, ItemInterface $item_interface)
    {
        $this->request = $request;
        $this->item_interface = $item_interface;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemResource::collection(
            $this->item_interface->getItemsByUser()->paginate(
                (int) $this->request->per_page
            )
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item_key)
    {
        return ItemResource::collection(
            $this->item_interface->getItemByItemKey($item_key)->paginate(
                (int) $this->request->per_page
            )
        );
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsers($item_key)
    {
        if ($this->item_interface->getItemByItemKey($item_key)->first()) {
            return ItemResource::collection(
                $this->item_interface->getItemUsersByItemKey($item_key)->paginate(
                    (int) $this->request->per_page
                )
            );
        } else {
            return response([
                'success' => false,
                'errors' => 'No query results.',
            ]);
        }
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
