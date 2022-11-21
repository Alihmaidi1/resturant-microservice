<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;


    public $fillable=["user_id","resturant_id"];


    public $hidden=["created_at","updated_at"];

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");

    }
    public function messages(){

        return $this->hasMany(message::class,"chat_id");
    }

}
