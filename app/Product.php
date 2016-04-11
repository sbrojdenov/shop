<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    
     use \Dimsav\Translatable\Translatable;
     public $translatedAttributes = ['title','summary', 'description','price'];
     protected $fillable = ['title', 'summary', 'description','price','image_url','slug','categories_id'];
     
     public function image_product() {
        return $this->belongsToMany('App\MyImage');
    }
}

class ProductTranslation extends Model {

    public $timestamps = false;
    protected $fillable = ['title','summary', 'description','price'];

}
