<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant extends Model
{
    use HasFactory;
    public $fillable=["name","address","rate"];

    public $hidden=["created_at","updated_at"];


    public function  aws(){

        return $this->hasOne(aws::class,"resturant_id");
    }

    public function foods(){


        return $this->hasMany(food::class,"resturant_id");
    }


    public function admins(){

        return $this->hasMany(admin::class,"resturant_id");
    }

    public function currencies(){

        return $this->hasMany(resturant::class,"resturant_id");
    }

    public function tabletypes(){

        return $this->hasMany(tabletype::class,"resturant_id");
    }


    public function tables(){


        return $this->hasMany(table::class,"resturant_id");
    }


    public function storehouses(){

        return $this->hasMany(storehouse::class,"resturant_id");
    }


    public function jobs(){


        return $this->hasMany(job::class,"resturant_id");
    }


    public function employeeExperiences(){

        return $this->hasMany(employee_experience::class,"resturant_id");

    }

    public function employees(){

        return $this->hasMany("App\Models\\employee","resturant_id");
    }


    public function categories(){

        return $this->hasMany(category::class,"resturant_id");

    }

    public function setting(){


        return $this->hasOne(setting::class,"resturant_id");
    }


    public function goods(){


        return $this->hasMany(good::class,"good_id");
    }


    public function sliders(){

        return $this->hasMany(slider::class,"resturant_id");
    }


    public function banners(){


        return $this->hasMany(banner::class,"resturant_id");
    }


}
