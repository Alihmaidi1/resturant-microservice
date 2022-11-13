<?php

namespace App\GraphQL\Mutations\Admin\Category;

use App\Models\category;
use App\Models\image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Json;

final class Addcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $logo=$args["logo"];
        $logoname=rand(0,9999999).time().".".$logo->getClientOriginalExtension();
        Storage::disk("public")->putFileAs("category",$logo,$logoname);
        $meta_logo=$args["meta_logo"];
        $meta_logoname=rand(0,9999999).time().".".$meta_logo->getClientOriginalExtension();
        Storage::disk("public")->putFileAs("category",$meta_logo,$meta_logoname);

        $category=category::create([
            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "logo"=>$logoname,
            "description"=>["en"=>$args["description_en"],"ar"=>$args["description_ar"]],
            "meta_description"=>["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]],
            "meta_title"=>["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]],
            "meta_logo"=>$meta_logoname,
            "keywords"=>$args["keywords"],
            "status"=>$args["status"],
            "resturant_id"=>$args["resturant_id"]
        ]);

        $images=$args["images"];
        foreach($images as $image){
            $namee=rand(0,9999999).time().".".$image->getClientOriginalExtension();
            Storage::disk("public")->putFileAs("category",$image,$namee);
            image::create([
                "url"=>$namee,
                "imageable_type"=>"app\Models\category",
                "imageable_id"=>$category->id
            ]);

        }
        $category->message=trans("admin.the category was added successfully");
        Cache::rememberForever("category:".$category->id,function() use($category){


            return $category;

        });

        Cache::pull("categorys");
        return $category;
    }
}
