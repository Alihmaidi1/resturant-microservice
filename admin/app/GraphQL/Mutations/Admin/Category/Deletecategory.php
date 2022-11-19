<?php

namespace App\GraphQL\Mutations\Admin\Category;

use App\Models\category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Deletecategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $category=category::find($args["id"]);
        Cache::pull("category:".$category->id);
        Cache::pull("categorys");
        Storage::disk("resturant_".$category->resturant_id)->delete($category->getRawOriginal("logo"));
        Storage::disk("resturant_".$category->resturant_id)->delete($category->getRawOriginal("meta_logo"));
        foreach($category->images as $image){

            Storage::disk("resturant_".$category->resturant_id)->delete($image->getRawOriginal("url"));
        }
        $category1=$category;
        $category1->message=trans("admin.the category was deleted successfully");
        $category->delete();
        return $category1;


    }
}
