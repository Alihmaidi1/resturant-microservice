<?php

namespace App\GraphQL\Mutations\Admin\Tabletype;

use App\Models\tabletype;

final class Edittabletype
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $tabletype=tabletype::find($args["id"]);
        $tabletype->name=["en"=>$args["name_en"],"ar"=>$args["name_ar"]];
        $tabletype->price=$args["price"];
        $tabletype->currency_id=$args["currency_id"];
        $tabletype->resturant_id=$args["resturant_id"];

        $tabletype->save();
        $tabletype->message=trans("admin.the table type was updated successfully");
        return $tabletype;

    }
}
