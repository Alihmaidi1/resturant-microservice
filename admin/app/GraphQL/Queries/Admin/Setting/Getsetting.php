<?php

namespace App\GraphQL\Queries\Admin\Setting;

use App\Models\setting;

final class Getsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return setting::where("resturant_id",$args["resturant_id"])->first();

    }
}
