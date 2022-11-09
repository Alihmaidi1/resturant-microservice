<?php

namespace App\GraphQL\Mutations\Admin\Currency;

use App\Models\currency;

final class Deletecurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $currency=currency::find($args["id"]);
        $currency1=$currency;
        $currency->delete();
        $currency1->message=trans("admin.the currency was deleted successfully");
        return $currency1;

    }
}
