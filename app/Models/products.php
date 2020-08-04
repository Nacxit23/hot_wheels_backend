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
        'product_categories_id',
        'size',
        'body_type',
        'color',
        'mark',
        'name',
        'type'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products_categorie()
    {
        return $this->belongsTo(products_categorie::class);
    }

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
}
