<?php

namespace App\GraphQL\Queries\Admin\Job;

use App\Models\job;

final class Getalljob
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $jobs=job::where("resturant_id",$args["resturant_id"])->get();
        return $jobs;

    }
}
