<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Deletebanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $banner=banner::find($args["id"]);
        Storage::disk("resturant_".$banner->id)->delete($banner->getRawOriginal("logo"));
        $banner1=$banner;
        $banner->delete();
        Cache::pull("banners");
        Cache::pull("banner:".$banner1->id);
        $banner1->message=trans("admin.the banner was deleted successfully");
        return $banner;

    }
}
