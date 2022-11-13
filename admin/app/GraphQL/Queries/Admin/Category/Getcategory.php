<?php

namespace App\GraphQL\Queries\Admin\Category;

use App\Models\category;
use Illuminate\Support\Facades\Cache;

final class Getcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return Cache::rememberForever("category:".$args["id"],function()use($args){

            return category::find($args["id"]);
        });


    }
}
