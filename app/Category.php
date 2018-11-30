<?php

namespace App;

use Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'name',
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

    /**
     * Get the items associated with the category.
     *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
