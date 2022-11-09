<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Models\currency_resturant;

final class Deletecurrencyinresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency_resturant=currency_resturant::find($args["id"]);
        $currency_resturant->message=trans("admin.the currency was deleted successfully from resturant");
        return $currency_resturant;
    }
}
