<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    public $fillable=["user_id","food_id","quantity"];
    public $hidden=["created_at","updated_at"];

    public function user(){

        return $this->belongsTo(User::class,"user_id");
    }

}
