<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'individual_sum',
        'total_sum',
        'auction_id',
        'sells_id',
        'users_id',
        'rup-number'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auction()
    {
        return $this->belongsTo(receipts::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sell()
    {
        return $this->belongsTo(sells::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
