<?php

namespace App;

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
        'date', 'frequency',
    ];
}
