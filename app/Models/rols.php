<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rols extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
