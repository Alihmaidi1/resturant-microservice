<?php

namespace App\GraphQL\Queries\Admin\EmployeeExperience;

use App\Models\employee_experience;

final class Getallexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $experiences=employee_experience::where("resturant_id",$args["resturant_id"])->get();

        return $experiences;
    }
}
