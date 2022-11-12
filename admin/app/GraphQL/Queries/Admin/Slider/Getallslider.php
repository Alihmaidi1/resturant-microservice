<?php

namespace App\GraphQL\Queries\Admin\Slider;

use App\Models\slider;

final class Getallslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        return slider::where("resturant_id",$args["resturant_id"])->get();
    }
}
