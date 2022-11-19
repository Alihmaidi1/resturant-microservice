<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Addbanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $name=saveimage("resturant_".$args["resturant_id"],$args["logo"],"banner");
        $banner=banner::create([
            "logo"=>$name,
            "status"=>$args["status"],
            "rank"=>$args["rank"],
            "url"=>$args["url"],
            "where_show"=>$args["where_show"],
            "resturant_id"=>$args["resturant_id"]
        ]);

        $banner->message=trans("admin.the banner was added successfully");
        Cache::pull("banners");
        Cache::put("banner:".$banner->id,$banner);
        return $banner;

    }
}
