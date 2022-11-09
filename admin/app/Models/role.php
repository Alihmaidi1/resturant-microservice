<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class role extends Model
{
    use HasFactory,HasTranslations;

    public $fillable=["name","permssions"];
    public $translatable = ['name'];

    public $hidden=["created_at","updated_at"];

    public function admins(){
        return $this->hasMany("App\Models\admin","role_id");
    }

    public function getPermssionsAttribute($value){
        return json_decode($value);
    }


}
