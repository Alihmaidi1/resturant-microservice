<?php

namespace App\GraphQL\Queries\Admin\Category;

use App\Models\category;

final class Getcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return category::find($args["id"]);


    }
}
