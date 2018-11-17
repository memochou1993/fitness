<?php

namespace App\Repositories;

use App\Contracts\UserItemInterface;
use App\User;
use App\UserItem;
use Illuminate\Http\Request; //

class UserItemRepository implements UserItemInterface
{
    protected $user;
    protected $user_item;
    protected $request;
    protected $per_page;

    public function __construct(User $user, UserItem $user_item, Request $request)
    {
        $this->user = $user;
        $this->user_item = $user_item;
        $this->request = $request;
    }

    public function getUserItemsByUserId($user_id)
    {
        $user_items = $this->user->find($user_id)->items();

        return $user_items->paginate($this->request->per_page);
    }
}
