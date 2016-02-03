<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = ['title', 'main_category', 'image_url','slug'];
}
