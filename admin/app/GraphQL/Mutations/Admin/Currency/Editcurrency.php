<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Exceptions\CustomException;
use App\Models\currency;

final class Editcurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $count=currency::where("is_default_for_website",1)->count();

        $currency=currency::find($args["id"]);
        if($currency->is_default_for_website==0&&$count>0&&$args["is_default"]==1){

            throw new CustomException("wee have default currency");
        }
        $currency->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $currency->code=$args["code"];
        $currency->resturant_id=$args["resturant_id"];
        $currency->is_default_for_website=$args["is_default"];
        $currency->precent_value_in_dular=$args["precent_value_in_dular"];
        $currency->save();
        $currency->message=trans("admin.the currency was updated successfully");
        return $currency;

    }
}
