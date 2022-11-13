<?php

namespace App\GraphQL\Mutations\Admin\Resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

final class Editresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $resturant=resturant::find($args["id"]);
        $resturant->name=$args["name"];
        $resturant->address=$args["address"];
        $resturant->save();
        Cache::put("resturant:".$resturant->id,$resturant);
        Cache::pull("resturants");
        $resturant->message=trans("admin.the resturant was updated successfully");
        return $resturant;

    }
}
