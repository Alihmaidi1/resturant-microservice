<?php

namespace App\GraphQL\Mutations\Admin\Food;

use App\Models\food;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

final class Deletefood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $food=food::find($args["id"]);
        Cache::pull("foods");
        Cache::pull("food:".$food->id);
        Storage::disk("resturant_".$food->resturant_id)->delete($food->getRawOriginal("thumbnail"));
        Storage::disk("resturant_".$food->resturant_id)->delete($food->getRawOriginal("meta_logo"));
        foreach($food->images as $image){
            Storage::disk("resturant_".$food->resturant_id)->delete($image->getRawOriginal("url"));
        }
        $food->message=trans("admin.the food was deleted successfully");
        return $food;


    }
}
