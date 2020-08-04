<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sells extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'datetime',
        'tire_state',
        'product_id',
        'type_pay_id',
        'users_id',
        'voucher',
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
}
