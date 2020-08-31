<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class sells extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'datetime',
        'product_id',
        'type_pay_id',
        'user_id',
        'detail'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(products::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type_pay()
    {
        return $this->belongsTo(type_pay::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany(receipts::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function scopeDaySells($query, $args)
    {
        logger($args);

        if ($args['status'] === "DAY") {
            return $query->where('datetime', '>=', now()->subDay());
        }
        if ($args['status'] === "WEEK") {
            return $query->where('datetime', '>=', now()->subWeek());
        }
        if ($args['status'] === "MONTH") {
            return $query->where('datetime', '>=', now()->subMonth());
        }
    }
}
