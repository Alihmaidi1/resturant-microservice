<?php

namespace App\GraphQL\Mutations\Admin\Food;

use App\Models\food;
use App\Models\image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Addfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $thumbnail=$args["thumbnail"];

        $thumbnail_name=saveimage("resturant_".$args["resturant_id"],$args["thumbnail"],"food");
        $meta_logo_name=saveimage("resturant_".$args["resturant_id"],$args["meta_logo"],"food");

        $food=food::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "thumbnail"=>$thumbnail_name,
            "description"=>["en"=>$args["description_en"],"ar"=>$args["description_ar"]],
            "tag"=>$args["tag"],
            "meta_title"=>["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]],
            "meta_description"=>["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]],
            "meta_logo"=>$meta_logo_name,
            "meta_keyword"=>$args["meta_keyword"],
            "category_id"=>$args["category_id"],
            "currency_id"=>$args["currency_id"],
            "resturant_id"=>$args["resturant_id"],
            "price"=>$args["price"]
        ]);

        foreach($args["images"] as $image){

            $namee=saveimage("resturant_".$args["resturant_id"],$image,"food");
            image::create([

                "url"=>$namee,
                "imageable_type"=>"app\Models\\food",
                "imageable_id"=>$food->id,
                "resturant_id"=>$args["resturant_id"]
            ]);

        }
        Cache::pull("foods");
        Cache::rememberForever("food:".$food->id,function() use($food){

            return $food;


        });
        $food->message=trans("admin.the food was added successfully");
        return $food;

    }
}
