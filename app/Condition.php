<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
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
