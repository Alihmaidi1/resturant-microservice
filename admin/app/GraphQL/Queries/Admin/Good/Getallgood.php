<?php

namespace App\GraphQL\Queries\Admin\Good;

use App\Models\good;

final class Getallgood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return good::where("resturant_id",$args["resturant_id"])->get();

    }
}
