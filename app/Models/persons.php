<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'genre',
        'date_birth',
        'city',
        'first_name',
        'identification',
        'last_name',
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);

    }
}
