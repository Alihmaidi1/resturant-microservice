<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class tabletype extends Model
{
    use HasFactory,HasTranslations;

    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];
    public $fillable=["name","price","currency_id","resturant_id"];

    public function currency(){

        return $this->belongsTo("\App\Models\currency","currency_id");

    }


    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");

    }



    public function tables(){


        return $this->hasMany(table::class,"tabletype_id");
    }


}
