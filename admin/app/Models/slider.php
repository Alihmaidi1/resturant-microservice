<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    public $fillable=["logo","status","rank","resturant_id"];
    public $hidden=["created_at","updated_at"];


    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");

    }
}
