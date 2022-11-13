<?php

namespace App\GraphQL\Queries\Admin\Banner;

use App\Models\banner;
use App\Models\resturant;
use Illuminate\Support\Facades\Cache;

final class Getbannerwhereshow
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $resturant= Cache::rememberForever("resturant:".$args["resturant_id"],function()use($args){


            return resturant::find($args["resturant_id"]);
        });

        $banners=$resturant->banners;
        $arr=[];
        foreach($banners as $banner){

            if($banner->where_show==$args["where_show"]){

                $arr[]=$banner;
            }
        }

        return $arr;
    }
}
