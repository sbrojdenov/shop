<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = ['title', 'summary', 'description','price','image_url','slug','categories_id'];
}
