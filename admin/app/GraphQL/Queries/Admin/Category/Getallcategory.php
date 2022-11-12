<?php

namespace App\GraphQL\Queries\Admin\Category;

use App\Models\category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Nette\Utils\Json;

final class Getallcategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return category::where("resturant_id",$args["resturant_id"])->get();
    }
}
