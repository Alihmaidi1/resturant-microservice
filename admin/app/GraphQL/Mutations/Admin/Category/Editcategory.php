<?php

namespace App\GraphQL\Mutations\Admin\Category;

use App\Models\category;
use App\Models\image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

final class Editcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $category=category::find($args["id"]);
        $oldResturant=$category->resturant_id;
        if($args["logo"]!=null){
            Storage::disk("resturant_".$category->resturant_id)->delete($category->getRawOriginal("logo"));
            $logoname=saveimage("resturant_".$args["resturant_id"],$args["logo"],"category");

        }else{

            $logoname=$category->getRawOriginal("logo");
        }

        if($args["meta_logo"]!=null){
            Storage::disk("resturant_".$category->resturant_id)->delete($category->getRawOriginal("meta_logo"));
            $meta_logoname=saveimage("resturant_".$args["resturant_id"],$args["meta_logo"],"category");


        }else{
            $meta_logoname=$category->getRawOriginal("meta_logo");
        }
        if($args["images"]!=null){

            foreach($category->images as $image){

                Storage::disk("resturant_".$category->resturant_id)->delete($image->getRawOriginal("url"));
                $image->delete();

            }
            foreach($args["images"] as $image){
                $namee=saveimage("resturant_".$args["resturant_id"],$image,"category");
                image::create([
                    "url"=>$namee,
                    "imageable_type"=>"app\Models\category",
                    "imageable_id"=>$category->id,
                    "resturant_id"=>$args["resturant_id"]
                ]);
            }
        }

        $category->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $category->logo=$logoname;
        $category->description=["en"=>$args["description_en"],"ar"=>$args["description_ar"]];
        $category->meta_description=["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]];
        $category->meta_title=["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]];
        $category->meta_logo=$meta_logoname;
        $category->keywords=$args["keywords"];
        $category->status=$args["status"];
        $category->resturant_id=$args["resturant_id"];
        $category->save();

        Cache::rememberForever("category:".$category->id,function() use($category){


            return $category;

        });

        Cache::pull("categorys");
        $category->message=trans("admin.the category was updated successfully");
        return $category;


    }
}
