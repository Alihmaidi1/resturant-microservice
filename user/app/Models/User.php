<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    public $fillable=["name","code","reset_code","balance","copon_notification","email","password","status","operation_code","resturant_id"];

    public $hidden=["created_at","updated_at"];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function suggests(){

        return $this->hasMany(suggest::class,"user_id");
    }

    public function wishlists(){

        return $this->hasMany(wishlist::class,"user_id");
    }


    public function carts(){

        return $this->hasMany(cart::class,"user_id");
    }

    public function reservations(){

        return $this->hasMany(reservation::class,"user_id");
    }


}
