<?php

namespace App\GraphQL\Queries\Admin\Tabletype;

use App\Models\tabletype;

final class Getalltabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return tabletype::where("resturant_id",$args["resturant_id"])->get();
    }
}
