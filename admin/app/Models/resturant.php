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


    public function currencies(){


        return $this->belongsToMany(currency::class,currency_resturant::class,"currency_id","resturant_id");
    }

    public function currency_resturant(){

        return $this->hasMany(currency_resturant::class,"resturant_id");
    }


    public function jobs(){


        return $this->hasMany(job::class,"resturant_id");
    }


    public function employeeExperiences(){

        return $this->hasMany(employee_experience::class,"resturant_id");

    }

}
