<?php

namespace App\GraphQL\Queries\Admin\Food;

use App\Models\food;
use Illuminate\Support\Facades\Cache;

final class Getfood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return Cache::rememberForever("food:".$args["id"],function()use($args){

            return food::find($args["id"]);
        });

    }
}
