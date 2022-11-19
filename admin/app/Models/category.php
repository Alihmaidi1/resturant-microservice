<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class category extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name',"description","meta_title","meta_description"];
    public $fillable=["name","logo","description","meta_description","meta_title","meta_logo","keywords","status","resturant_id"];
    public $hidden=["created_at","updated_at"];


    public function foods(){

        return $this->hasMany(food::class,"category_id");
    }

    public function images(){

        return $this->morphMany("\App\Models\image","imageable");
    }


    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }

    public function getLogoattribute($value){


        return Storage::disk("resturant_".$this->resturant_id)->url($value);


    }


    public function getMetaLogoattribute($value){


        return Storage::disk("resturant_".$this->resturant_id)->url($value);


    }


}
