<?php

namespace App\GraphQL\Queries\Admin\Aws;

use App\Models\aws;

final class Getaws
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $aws=aws::where("resturant_id",$args["resturant_id"])->first();

        return $aws;

    }
}
