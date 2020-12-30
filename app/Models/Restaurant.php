<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tag_one',
        'tag_two',
        'address',
        'zip',
        'city',
        'email',
        'password'
    ];
}
