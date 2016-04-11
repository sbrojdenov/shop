<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyImage extends Model {
   protected $table = 'images';
   public $timestamps  = false;

    protected $fillable = ['name'];
    

   

}
