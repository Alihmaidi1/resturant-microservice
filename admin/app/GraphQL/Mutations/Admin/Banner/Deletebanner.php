<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;

final class Deletebanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $banner=banner::find($args["id"]);
        // Cache::pull("banners");
        // Cache::pull("banner:".$banner->id);
        unlink(public_path("banner/".$banner->getRawOriginal("logo")));
        $banner->message=trans("admin.the banner was deleted successfully");
        return $banner;


    }
}
