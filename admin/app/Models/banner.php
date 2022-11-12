<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;


    public $fillable=["logo","where_show","status","url","rank","resturant_id"];

    public $hidden=["created_at","updated_at"];


    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }
}
