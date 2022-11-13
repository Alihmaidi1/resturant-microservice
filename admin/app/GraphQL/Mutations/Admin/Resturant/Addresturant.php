<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

final class Addresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $resturant=resturant::create([

            "address"=>$args["address"],
            "name"=>$args["name"]
        ]);
        Cache::put("resturant:".$resturant->id,$resturant);
        Cache::pull("resturants");
        $resturant->message=trans("admin.the resturant was created successfully");
        return $resturant;


    }
}
