<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class type_pay extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'name',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sells()
    {
        return $this->hasMany(sells::class);

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auctions()
    {
        return $this->hasMany(auction::class);
    }
}
