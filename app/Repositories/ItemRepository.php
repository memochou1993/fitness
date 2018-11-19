<?php

namespace App\Repositories;

use Auth;
use App\Repositories\Repository;
use App\Contracts\ItemInterface;

class ItemRepository extends Repository implements ItemInterface
{
    /**
     *
     *
     *
     */
    public function getItemsByUser()
    {
        return Auth::user()->items()->paginate($this->request->per_page);
    }
}
