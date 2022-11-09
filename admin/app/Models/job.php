<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class job extends Model
{
    use HasFactory,HasTranslations;
    public $fillable=["name","salary","currency_resturant_id","resturant_id"];
    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }


    public function currencyResturant(){

        return $this->belongsTo(currency_resturant::class,"currency_resturant_id");
    }



}
