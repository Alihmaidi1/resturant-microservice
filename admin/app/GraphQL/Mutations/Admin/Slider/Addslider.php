<?php

namespace App\GraphQL\Mutations\Admin\Slider;

use App\Models\slider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Addslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $name=saveimage("resturant_".$args["resturant_id"],$args["logo"],"slider");
        $slider=slider::create([
            "logo"=>$name,
            "status"=>$args["status"],
            "rank"=>$args["rank"],
            "resturant_id"=>$args["resturant_id"]
        ]);
        $slider->message=trans("admin.the slider was added successfully");
        return $slider;
        }
}
