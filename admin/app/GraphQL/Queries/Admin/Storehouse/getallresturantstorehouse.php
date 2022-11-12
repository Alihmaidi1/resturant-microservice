<?php

namespace App\GraphQL\Queries\Admin\Storehouse;

use App\Models\storehouse;

final class getallresturantstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        return storehouse::where("resturant_id",$args["resturant_id"])->get();

    }
}
