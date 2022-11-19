<?php

namespace App\GraphQL\Mutations\Admin\Food;

use App\Models\food;
use App\Models\image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Editfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $food=food::find($args["id"]);
        if($args["thumbnail"]!=null){

            Storage::disk("resturant_".$food->resturant_id)->delete($food->getRawOriginal("thumbnail"));
            $name_thumbnail=saveimage("resturant_".$args["resturant_id"],$args["thumbnail"],"food");
            $food->thumbnail=$name_thumbnail;


        }


        if($args["meta_logo"]!=null){

            Storage::disk("resturant_".$food->resturant_id)->delete($food->getRawOriginal("meta_logo"));
            $name_meta_logo=saveimage("resturant_".$args["resturant_id"],$args["meta_logo"],"food");
            $food->meta_logo=$name_meta_logo;

        }
        if($args["images"]!=null){

            foreach($food->images as $image){
                Storage::disk("resturant_".$food->resturant_id)->delete($image->getRawOriginal("url"));
                $image->delete();
            }
            foreach($args["images"] as $image){

                $namee=saveimage("resturant_".$args["resturant_id"],$image,"food");
                image::create([
                    "url"=>$namee,
                    "imageable_type"=>"app\Models\\food",
                    "imageable_id"=>$food->id,
                    "resturant_id"=>$args["resturant_id"]
                ]);

            }

        }

        $food->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $food->description=["en"=>$args["description_en"],"ar"=>$args["description_ar"]];
        $food->tag=$args["tag"];
        $food->meta_title=["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]];
        $food->meta_description=["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]];
        $food->meta_keyword=$args["meta_keyword"];
        $food->category_id=$args["category_id"];
        $food->price=$args["price"];
        $food->currency_id=$args["currency_id"];
        $food->resturant_id=$args["resturant_id"];
        $food->save();

        Cache::pull("foods");
        Cache::rememberForever("food:".$food->id,function() use($food){

            return $food;


        });


        $food->message=trans("admin.the food was updated successfully");
        return $food;

    }
}
