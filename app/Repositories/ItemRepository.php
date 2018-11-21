<?php

namespace App\Repositories;

use Auth;
use App\Item;
use App\Repositories\Repository;
use App\Contracts\ItemInterface;
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
        return Auth::user()->items();
    }

    /**
     *
     *
     *
     */
    public function getItemByItemKey($item_key)
    {
        return Auth::user()->items()->where('key', $item_key);
    }

    /**
     *
     *
     *
     */
    public function getItemUsersByItemKey($item_key)
    {
        return Item::where('key', $item_key)->first()->users();
    }
}
