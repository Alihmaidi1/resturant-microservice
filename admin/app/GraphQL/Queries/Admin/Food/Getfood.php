<?php

namespace App\GraphQL\Queries\Admin\Food;

use App\Models\food;

final class Getfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return food::find($args["id"]);

    }
}
