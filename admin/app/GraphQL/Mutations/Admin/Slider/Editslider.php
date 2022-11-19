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
            Storage::disk("resturant_".$slider->resturant_id);
            $name=saveimage("resturant_".$args["resturant_id"],$args["logo"],"slider");
            $slider->logo=$name;
        }
        $slider->status=$args["status"];
        $slider->rank=$args["rank"];
        $slider->resturant_id=$args["resturant_id"];
        $slider->save();
        $slider->message=trans("admin.the slider was updated successfully");
        return $slider;

    }
}
