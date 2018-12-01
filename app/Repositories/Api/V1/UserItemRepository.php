<?php

namespace App\Repositories\Api\V1;

use App\Item;
use App\UserItem;
use Illuminate\Http\Request;
use App\Repositories\Api\ApiRepository;
use App\Contracts\Api\V1\UserItemInterface;

class UserItemRepository extends ApiRepository implements UserItemInterface
{
    /**
     *
     */
    protected $request;

    /**
     *
     */
    protected $item;

    /**
     *
     */
    protected $user_item;

    /**
     *
     *
     *
     */
    public function __construct(Request $request, Item $item, UserItem $user_item)
    {
        parent::__construct();

        $this->request = $request;

        $this->item = $item;

        $this->user_item = $user_item;
    }

    /**
     *
     *
     *
     */
    public function getAllUserItems()
    {
        $items = $this->user->items();

        if ($this->with) {
            $items->with($this->with);
        }

        return $items->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getUserItem($item_key)
    {
        $items = $this->user->items();

        if ($this->with) {
            $items->with($this->with);
        }

        return $items->where('key', $item_key)->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function postUserItem()
    {
        $item = $this->item->create([
            'key' => substr(md5(now()), 0, 5),
            'name' => $this->request->name,
            'unit' => $this->request->unit,
            'category_id' => $this->request->category_id,
        ]);

        $item->users()->attach([
            $this->user->id => [
                'frequency' => $this->request->frequency,
            ]
        ]);

        return $item;
    }

    /**
     *
     *
     *
     */
    public function putUserItem($item_key)
    {
        $user_item = $this->user_item->find($this->request->user_item_id);

        return ($this->user->can('update', $user_item)) ? $user_item->update($this->request->all()) : false;
    }
}
