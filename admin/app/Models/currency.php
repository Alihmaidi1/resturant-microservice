<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class currency extends Model
{
    use HasFactory;

    use HasFactory,HasTranslations;

    public $fillable=["code","name","precent_value_in_dular"];
    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];


    public function resturants(){


        return $this->belongsToMany(resturant::class,currency_resturant::class,"resturant_id","currency_id");
    }


    public function currency_resturant(){

        return $this->hasMany(currency_resturant::class,"currency_id");

    }

}
