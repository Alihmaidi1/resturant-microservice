<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class food extends Model
{
    use HasFactory,HasTranslations;

    public $fillable=["name","thumbnail","description","tag","price","meta_title","meta_description","meta_logo","meta_keyword","category_id","currency_id","resturant_id"];
    public $hidden=["created_at","updated_at","category_id"];
    public $translatable=["name","description","meta_title","meta_description"];


    public function resturant(){


        return $this->belongsTo(resturant::class,"resturant_id");
    }


    public function category(){


        return $this->belongsTo(category::class,"category_id");
    }



    public function images(){

        return $this->morphMany(image::class,"imageable");
    }


    public function currency(){

        return $this->belongsTo(currency::class,"currency_id");
    }


}
