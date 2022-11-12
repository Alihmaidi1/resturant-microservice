<?php

namespace App\GraphQL\Mutations\Admin\Good;

use App\Models\good;

final class Addgood
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $good=good::create([

            "name"=>["en"=>$args["name_en"],"ar"=>$args["name_ar"]],
            "resturant_id"=>$args["resturant_id"]
        ]);

        $good->message=trans("admin.the good was added successfully");

        return $good;

    }
}
