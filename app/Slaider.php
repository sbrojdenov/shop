<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slaider extends Model
{
     use \Dimsav\Translatable\Translatable;
     public $translatedAttributes = ['name','description'];
     protected $fillable = ['name', 'description', 'image_url','slug'];
}

class SlaiderTranslation extends Model {

    public $timestamps = false;
    protected $fillable = ['name','description'];

}
