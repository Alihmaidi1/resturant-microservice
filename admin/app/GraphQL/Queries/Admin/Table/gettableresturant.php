<?php

namespace App\GraphQL\Queries\Admin\Table;

use App\Models\table;

final class gettableresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return table::where("resturant_id",$args["resturant_id"])->get();

    }
}
