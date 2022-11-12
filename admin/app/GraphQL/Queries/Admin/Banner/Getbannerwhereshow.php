<?php

namespace App\GraphQL\Queries\Admin\Banner;

use App\Models\banner;

final class Getbannerwhereshow
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return banner::where("resturant_id",$args["resturant_id"])->where("where_show",$args["where_show"])->get();
    }
}
