<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class setting extends Model
{
    use HasFactory,HasTranslations;

    public $fillable=["paypal_client_id","paypal_secret","meta_logo","logo","status","phone","meta_title","meta_description","meta_keyword","balance_status","balance_charge","currency_id","open_at","close_at","day_open","facebook_status","facebook_link","whatsapp_status","whatsapp_link","telegram_status","telegram_link","instagram_status","instagram_link","twitter_status","twitter_link","paypal_status","owner_name","resturant_id"];
    public $translatable=["meta_title","meta_description","day_open"];


    public function getLogoattribute($value){

        return Storage::disk("resturant_".$this->resturant_id)->url($value);
    }

    public function getMetaLogoattribute($value){

        return Storage::disk("resturant_".$this->resturant_id)->url($value);
    }

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }


    public function currency(){

        return $this->belongsTo(currency::class,"currency_id");
    }

}
