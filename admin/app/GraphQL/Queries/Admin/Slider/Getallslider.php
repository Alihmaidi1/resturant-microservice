<?php

namespace App\GraphQL\Queries\Admin\Slider;

use App\Models\resturant;
use App\Models\slider;
use Illuminate\Support\Facades\Cache;

final class Getallslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturant=Cache::rememberForever("resturant:".$args["resturant_id"],function()use($args){

            resturant::find($args["id"]);

        });

        return $resturant->sliders;



    }
}
