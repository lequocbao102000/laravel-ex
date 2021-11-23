<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name_pro',
        'des_pro',
        'img_pro',
        'price_pro',
        'active_pro',
        'menu_id'
    ];
}
