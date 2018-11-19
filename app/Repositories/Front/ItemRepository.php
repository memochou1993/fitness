<?php

namespace App\Repositories\Front;

use Auth;
use App\Repositories\Repository;
use App\Contracts\Front\ItemInterface;

class ItemRepository extends Repository implements ItemInterface
{
    /**
     *
     *
     *
     */
    public function getItems()
    {
        return Auth::user()->items()->paginate($this->request->per_page);
    }
}
