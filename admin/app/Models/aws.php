<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aws extends Model
{
    use HasFactory;

    public $fillable=["aws_access_key","aws_secret_access","aws_region","aws_bucket","resturant_id"];

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }


    public $hidden=["created_at","updated_at"];

}
