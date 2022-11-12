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
            unlink(public_path("category/".$category->getRawOriginal("logo")));
            $logo=$args["logo"];
            $logoname=rand(0,9999999).time().".".$logo->getClientOriginalExtension();
            Storage::disk("public")->putFileAs("category",$logo,$logoname);


        }else{

            $logoname=$category->logo;
        }

        if($args["meta_logo"]!=null){
            unlink(public_path("category/".$category->getRawOriginal("meta_logo")));
            $meta_logo=$args["meta_logo"];
            $meta_logoname=rand(0,9999999).time().".".$meta_logo->getClientOriginalExtension();
            Storage::disk("public")->putFileAs("category",$meta_logo,$meta_logoname);


        }else{

            $meta_logoname=$category->meta_logo;
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
        if($args["images"]!=null){

        foreach($category->images as $image){

            unlink(public_path("category/".$image->getRawOriginal("url")));
            $image->delete();

        }
        foreach($args["images"] as $image){
            $namee=rand(0,9999999).time().".".$image->getClientOriginalExtension();
            Storage::disk("public")->putFileAs("category",$image,$namee);
            image::create([
                "url"=>$namee,
                "imageable_type"=>"app\Models\category",
                "imageable_id"=>$category->id
            ]);


        }
        }

        Cache::pull("category_resturant_".$oldResturant.":".$category->id);
        Cache::put("category_resturant_".$args["resturant_id"].":".$category->id,$category);
        Cache::pull("categorys");
        $category->message=trans("admin.the category was updated successfully");
        return $category;


    }
}
