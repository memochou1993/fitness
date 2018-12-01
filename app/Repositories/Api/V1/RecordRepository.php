<?php

namespace App\Repositories\Api\V1;

use App\Item;
use App\Record;
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
    public function getAllUserRecords()
    {
        $items = $this->user->items()->withPivot([
            'id', 'frequency', 'completed',
        ]);

        return $items->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function getUserRecord($item_key)
    {
        $items = $this->user->items()->withPivot([
            'id', 'frequency', 'completed',
        ]);

        return $items->where('key', $item_key)->paginate($this->per_page);
    }

    /**
     *
     *
     *
     */
    public function postUserRecord()
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
    public function putUserRecord($item_key)
    {
        $record = $this->record->find($this->request->record_id);

        return ($this->user->can('update', $record)) ? $record->update($this->request->all()) : false;
    }
}
