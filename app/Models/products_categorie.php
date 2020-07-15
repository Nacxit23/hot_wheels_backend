<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class products_categorie extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'active',
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(products::class);
    }
}
