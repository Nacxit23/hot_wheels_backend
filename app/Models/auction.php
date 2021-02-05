<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class auction extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'first_dateTime',
        'last_dateTime',
        'product_id',
        'type_pay_id',
        'description',
        'detail',
        'active',
        'user_id',
        'auctions_state'
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
    public function buddings()
    {
        return $this->hasMany(buddings::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipts()
    {
        return $this->hasMany(receipts::class);
    }
}
