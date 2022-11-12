<?php

namespace App\GraphQL\Queries\Admin\Banner;

use App\Models\banner;

final class Getallbanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return banner::where("resturant_id",$args["resturant_id"])->get();

    }
}
