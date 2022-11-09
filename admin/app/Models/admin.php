<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class admin extends Authenticatable
{
    use HasFactory,HasApiTokens;

    public $fillable=["email","password","reser_code","role_id","rank","resturant_id"];

    public $hidden=["created_at","updated_at","password"];

    public function role(){

        return $this->belongsTo("App\Models\\role","role_id");

    }

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }


}
