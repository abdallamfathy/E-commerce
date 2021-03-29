<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
////
class Product extends Model
{
    protected $fillable = ['price', 'image', 'name', 'discription' ];

}
