<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RecordResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'category' => $this->category->name,
            'name' => $this->name,
            'frequency' => $this->pivot->frequency,
            'unit' => $this->unit,
            'completed' => $this->pivot->completed,
            'created_at' => $this->pivot->created_at->toDateTimeString(),
            'updated_at' => $this->pivot->updated_at->toDateTimeString(),
        ];
    }
}
