<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buddings extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'date_budding',
        'price',
        'users_id',
        'auction_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auction()
    {
        return $this->belongsTo(auction::class);
    }
}
