<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Models\currency;

final class Editcurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency=currency::find($args["id"]);
        $currency->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $currency->code=$args["code"];
        $currency->precent_value_in_dular=$args["precent_value_in_dular"];
        $currency->save();
        $currency->message=trans("admin.the currency was updated successfully");
        return $currency;

    }
}
