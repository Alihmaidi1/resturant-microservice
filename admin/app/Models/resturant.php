<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant extends Model
{
    use HasFactory;
    public $fillable=["name","address","rate"];

    public $hidden=["created_at","updated_at"];

    public function admins(){

        return $this->hasMany(admin::class,"resturant_id");
    }

}
