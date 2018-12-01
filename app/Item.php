<?php

namespace App;

use Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'name', 'unit', 'category_id',
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
     * Get the category associated with the item.
     *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The users that belong to the item.
     *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'records')->withTimestamps();
    }
}
