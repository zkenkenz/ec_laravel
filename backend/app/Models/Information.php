<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    /**
     * 
     * 可変項目
     */

    protected $table = 'informations';
    
    protected $fillable =[ 
        'name',
        'tel',
        'postalCode',
        'address',
        'email',
        'item_id'
    ];
}
