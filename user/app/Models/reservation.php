<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    public $fillable=["code","table_id","status","name","start","end","user_id"];

    public $hidden=["created_at","updated_at"];


    public function user(){

        return $this->belongsTo(User::class,"user_id");
    }

}
