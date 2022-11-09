<?php

namespace App\GraphQL\Queries\Admin\Employee;

use App\Models\employee;

final class Getallemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return employee::where("resturant_id",$args["resturant_id"])->get();
    }
}
