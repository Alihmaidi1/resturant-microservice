<?php

namespace App\GraphQL\Queries\Admin\Food;

use App\Models\food;
use App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class Getallfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $resturant=Cache::rememberForever("resturant:".$args["resturant_id"],function($args){

            return resturant::find($args["resturant_id"]);

        });
        return $resturant->foods;
    }
}
