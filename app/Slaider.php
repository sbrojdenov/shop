<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slaider extends Model
{
     protected $fillable = ['name', 'description', 'image_url','slug'];
}
