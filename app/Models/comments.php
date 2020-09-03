<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'date_budding',
        'price',
        'users_id',
        'comment',
        'sells_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sell()
    {
        return $this->belongsTo(sells::class,"sells_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class,"users_id");
    }
}
