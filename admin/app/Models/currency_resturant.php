<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currency_resturant extends Model
{
    use HasFactory;

    public $fillable=["currency_id","resturant_id","created_at","updated_at","is_default_for_website"];


    public function getIs_default_for_websiteAttribute($value){

        return ($value)?trans("admin.yes"):trans("admin.no");

    }


    public $hidden=["created_at","updated_at"];


    public function resturants(){


        return $this->belongsTo(resturant::class,"resturant_id");

    }


    public function currencies(){


    return $this->belongsTo(currency::class,"currency_id");

}

}
