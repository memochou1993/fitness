<?php

namespace App\Repositories;

use Auth;
use App\Item;
use App\Repositories\Repository;
use App\Contracts\ItemInterface;
use App\Http\Resources\ItemResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemRepository extends Repository implements ItemInterface
{
    /**
     *
     *
     *
     */
    public function getItemsByUser()
    {
        return ItemResource::collection(
            Auth::user()->items()->paginate($this->request->per_page)
        );
    }

    /**
     *
     *
     *
     */
    public function getItemsByItemKey($item_key)
    {
        try {
            Auth::user()->items()->where('key', $item_key)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
                'errors' => $e->getMessage(),
            ]);
        }

        return ItemResource::collection(
            Item::where('key', $item_key)->with('users')->get()
        );
    }
}
