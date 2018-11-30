<?php

namespace App;

use Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'frequency', 'completed',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'frequency' => 'float',
        'completed' => 'boolean',
    ];

    /**
     *
     *
     *
     */
    public function getCreatedAtAttribute($value)
    {
        return Request::input('diffForHumans') == 'true' ? Carbon::parse($value)->diffForHumans() : $value;
    }

    /**
     *
     *
     *
     */
    public function getUpdatedAtAttribute($value)
    {
        return Request::input('diffForHumans') == 'true' ? Carbon::parse($value)->diffForHumans() : $value;
    }
}
