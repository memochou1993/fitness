<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\ApiRequest;

class RecordRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'GET':
                return [
                    'per_page' => 'min:1|integer',
                ];

            case 'POST':
                return [
                    'name' => 'required|max:255',
                    'unit' => 'required|max:255',
                    'category_id' => 'required|integer|max:255',
                    'frequency' => 'required|max:255',
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'user_item_id' => 'required|integer|max:255',
                    'frequency' => 'required|max:255',
                    'completed' => 'required|boolean',
                ];

            default:
                return [
                    //
                ];
        }
    }
}
