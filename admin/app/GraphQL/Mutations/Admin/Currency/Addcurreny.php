<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Models\currency;

final class Addcurreny
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency=currency::create([
            "code"=>$args["code"],
            "name"=>["ar"=>$args["name_ar"],"en"=>$args["name_en"]],
            "precent_value_in_dular"=>$args["precent_value_in_dular"],
        ]);
        $currency->message=trans("admin.the currency was created successfully");
        return $currency;

    }
}
