<?php

namespace App\GraphQL\Queries\Admin\Food;

use App\Models\food;

final class Getallfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        return food::where("resturant_id",$args["resturant_id"])->get();
    }
}
