<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggest extends Model
{
    use HasFactory;

    public $fillable=["description","user_id","resturant_id"];
    public $hidden=["created_at","updated_at"];

    public function user(){

        return $this->belongsTo(User::class,"user_id");
    }
}
