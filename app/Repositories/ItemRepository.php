<?php

namespace App\Repositories;

use App\Contracts\ItemInterface;
use App\User;
use Illuminate\Http\Request;

class ItemRepository implements ItemInterface
{
    protected $user;
    protected $request;

    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    public function getItemsByUserId($user_id)
    {
        return $this->user->findOrFail($user_id)->items()->paginate($this->request->per_page);
    }
}
