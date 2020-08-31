<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'date',
        'price',
        'productCategories_id',
        'size',
        'body_type',
        'color',
        'mark',
        'name',
        'type',
        'category',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auctions()
    {
        return $this->hasMany(auction::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sells()
    {
        return $this->hasMany(sells::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
