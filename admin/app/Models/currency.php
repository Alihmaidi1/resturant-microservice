<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class currency extends Model
{
    use HasFactory;

    use HasFactory,HasTranslations;

    public $fillable=["code","name","precent_value_in_dular","resturant_id","is_default_for_website"];

    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];



    public function resturant(){


        return $this->belongsTo(resturant::class,"resturant_id");
    }


    public function jobs(){

        return $this->hasMany(currency::class,"currency_id");
    }



    public function foods(){

        return $this->hasMany(food::class,"food_id");
    }
    public function tabletypes(){

        return $this->hasMany(tabletype::class,"currency_id");
    }


    public function setting(){

        return $this->hasOne(setting::class,"currency_id");
    }
}
