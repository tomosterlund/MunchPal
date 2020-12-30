<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'restaurant_id',
        'type' // sollte nur mit 'food', 'drink', or 'sides' gepostet werden.
    ];

}
