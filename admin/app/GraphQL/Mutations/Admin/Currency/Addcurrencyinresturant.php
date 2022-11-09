<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Exceptions\CustomException;
use App\Models\currency;
use App\Models\currency_resturant;

final class Addcurrencyinresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if($args["is_default"]==1){

            $count=currency_resturant::where("resturant_id",$args["resturant_id"])->where("currency_id",$args["currency_id"])->count();
            if($count==1){

                throw new CustomException(trans("admin.we have error"));
            }


        }
        $currency=currency_resturant::create([

            "resturant_id"=>$args["resturant_id"],
            "currency_id"=>$args["currency_id"],
            "is_default_for_website"=>$args["is_default"]
        ]);
        $currency->message=trans("admin.the currency was added to resturant successfully");
        return $currency;



    }
}
