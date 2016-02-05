<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     use \Dimsav\Translatable\Translatable;
     public $translatedAttributes = ['title'];
     protected $fillable = ['title', 'main_category', 'image_url','slug'];
}


class CategoryTranslation extends Model {

    public $timestamps = false;
    protected $fillable = ['title'];

}
