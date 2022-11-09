<?php

namespace App\GraphQL\Queries\Admin\Resturant;

use App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class Findresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $resturant= Cache::rememberForever("resturant:".$args["id"],function() use($args) {

            return resturant::find($args["id"]);
        });
        $resturant->message=trans("admin.the data was fetched successfully");
        return $resturant;

    }
}
