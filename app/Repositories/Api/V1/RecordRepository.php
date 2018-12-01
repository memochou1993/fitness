<?php

namespace App\Repositories\Api\V1;

use App\Item;
use App\UserItem as Record;
use Illuminate\Http\Request;
use App\Repositories\Api\ApiRepository;
use App\Contracts\Api\V1\RecordInterface;

class RecordRepository extends ApiRepository implements RecordInterface
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
    protected $record;

    /**
     *
     *
     *
     */
    public function __construct(Request $request, Item $item, Record $record)
    {
        parent::__construct();

        $this->request = $request;

        $this->item = $item;

        $this->record = $record;
    }

    /**
     *
     *
     *
     */
    public function getAllRecords()
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
    public function getRecord($item_key)
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
    public function postRecord()
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
    public function putRecord($item_key)
    {
        $record = $this->record->find($this->request->record_id);

        return ($this->user->can('update', $record)) ? $record->update($this->request->all()) : false;
    }
}
