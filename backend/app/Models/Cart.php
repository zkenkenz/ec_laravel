<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * 
     * 可変項目
     */

    protected $fillable = [
        'item_id',
        'name',
        'imgpash',
        'detail',
        'stock',
        'price'
    ];

}
