<?php

namespace App\GraphQL\Mutations\Admin\Slider;

use App\Models\slider;
use Illuminate\Support\Facades\Storage;

final class Editslider
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $slider=slider::find($args["id"]);

        if($args["logo"]!=null){

            unlink(public_path("slider/".$slider->getRawOriginal("logo")));
            $name=rand().".".$args["logo"]->getClientOriginalExtension();
            Storage::disk("public")->putFileAs("slider",$args["logo"],$name);
            $slider->logo=$name;

        }
        $slider->status=$args["status"];
        $slider->rank=$args["rank"];
        $slider->resturant_id=$args["resturant_id"];
        $slider->save();
        // Cache::pull("sliders");
        // Cache::put("slider:".$slider->id,$slider);
        $slider->message=trans("admin.the slider was updated successfully");
        return $slider;

    }
}
