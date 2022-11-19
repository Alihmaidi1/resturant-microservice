<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Editbanner
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $banner=banner::find($args["id"]);

        if($args["logo"]!=null){

            Storage::disk("resturant_".$banner->id)->delete($banner->getRawOriginal("logo"));
            $path=saveimage("resturant_".$args["resturant_id"],$args["logo"],"banner");
            $banner->logo=$path;
        }
        $banner->status=$args["status"];
        $banner->rank=$args["rank"];
        $banner->url=$args["url"];
        $banner->where_show=$args["where_show"];
        $banner->resturant_id=$args["resturant_id"];
        $banner->save();
        Cache::pull("banners");
        Cache::put("banner:".$banner->id,$banner);
        $banner->message=trans("admin.the banner was updated successfully");
        return $banner;

    }
}
