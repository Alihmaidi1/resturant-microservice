<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Exceptions\CustomException;
use App\Models\admin;
use App\Models\currency;

final class Addcurreny
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $count=currency::where("is_default_for_website",1)->count();
        if($count>0&& $args["is_default"]){

             throw new CustomException("we have default currency in this resturant");

        }
        $currency=currency::create([
            "code"=>$args["code"],
            "name"=>["ar"=>$args["name_ar"],"en"=>$args["name_en"]],
            "precent_value_in_dular"=>$args["precent_value_in_dular"],
            "resturant_id"=>$args["resturant_id"],
            "is_default_for_website"=>$args["is_default"]
        ]);
        $currency->message=trans("admin.the currency was created successfully");
        return $currency;

    }
}
