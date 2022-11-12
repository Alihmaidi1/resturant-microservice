<?php

namespace App\GraphQL\Queries\Admin\Currency;

use App\Models\currency;

final class getallcurrency
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return currency::where("resturant_id",$args["resturant_id"])->get();

    }
}
