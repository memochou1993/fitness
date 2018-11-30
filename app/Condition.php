<?php

namespace App;

use Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'date', 'weight',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'weight' => 'float',
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

    /**
     * Get the user associated with the condition.
     *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
