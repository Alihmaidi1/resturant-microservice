<?php

namespace App\GraphQL\Mutations\Admin\EmployeeExperience;

use App\Models\employee_experience;

final class Addexperiece
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $experiece=employee_experience::create([

            "year"=>$args["year"],
            "benifit"=>$args["benifit"],
            "vacation"=>$args["vacation"],
            "resturant_id"=>$args["resturant_id"]

        ]);
        $experiece->message=trans("admin.the experiece was added successfully");
        return $experiece;


    }
}
