<?php

namespace App\GraphQL\Mutations\Admin\Banner;

use App\Models\banner;
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

            unlink(public_path("banner/".$banner->getRawOriginal("logo")));
            $name=time().".".$args["logo"]->getClientOriginalExtension();
            Storage::disk("public")->putFileAs("banner",$args["logo"],$name);
            $banner->logo=$name;

        }

        $banner->status=$args["status"];
        $banner->rank=$args["rank"];
        $banner->url=$args["url"];
        $banner->where_show=$args["where_show"];
        $banner->resturant_id=$args["resturant_id"];
        $banner->save();
        // Cache::pull("banners");
        // Cache::put("banner:".$banner->id,$banner);
        $banner->message=trans("admin.the banner was updated successfully");
        return $banner;

    }
}
