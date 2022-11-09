<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class admin extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens;

    public $fillable=["email","password","reser_code","role_id","rank","resturant_id"];

    public $hidden=["created_at","updated_at","password"];

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function role(){

        return $this->belongsTo("App\Models\\role","role_id");

    }

    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }


}
