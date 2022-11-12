<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
use Illuminate\Support\Facades\Storage;

final class Addbanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $logo=$args["logo"];
        $name=time().".".$logo->getClientOriginalExtension();
        Storage::disk("public")->putFileAs("banner",$logo,$name);

        $banner=banner::create([
            "logo"=>$name,
            "status"=>$args["status"],
            "rank"=>$args["rank"],
            "url"=>$args["url"],
            "where_show"=>$args["where_show"],
            "resturant_id"=>$args["resturant_id"]
        ]);

        // Cache::pull("banners");
        // Cache::put("banner:".$banner->id,$banner);
        $banner->message=trans("admin.the banner was added successfully");
        return $banner;

    }
}
