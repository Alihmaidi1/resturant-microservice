<?php

namespace App\GraphQL\Mutations\Admin\Slider;

use App\Models\slider;
use Illuminate\Support\Facades\Storage;

final class Addslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $logo=$args["logo"];
        $name=rand(0,99999999).".".$logo->getClientOriginalExtension();
        Storage::disk("public")->putFileAs("slider",$logo,$name);
        $slider=slider::create([
            "logo"=>$name,
            "status"=>$args["status"],
            "rank"=>$args["rank"],
            "resturant_id"=>$args["resturant_id"]
        ]);

        $slider->message=trans("admin.the slider was added successfully");
        // Cache::put("slider:".$slider->id,$slider);
        // Cache::pull("sliders");
        // return Cache::get("slider:".$slider->id);

        return $slider;
        }
}
