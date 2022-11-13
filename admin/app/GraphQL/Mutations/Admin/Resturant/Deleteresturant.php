<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

final class Deleteresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {



        $resturant=resturant::find($args["id"]);
        Cache::pull("resturant:".$resturant->id);
        Cache::pull("resturants");
        $resturant1=$resturant;
        $resturant->delete();
        $resturant1->message=trans("admin.the resturant was deleted successfully");
        return $resturant1;


    }
}
