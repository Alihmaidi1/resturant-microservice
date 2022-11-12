<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;
use App\Models\storehouse;

final class Addgoodstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $goodstore=goodstore::create([
            "quantity"=>$args["quantity"],
            "min_quantity"=>$args["min_quantity"],
            "good_id"=>$args["good_id"],
            "storehouse_id"=>$args["storehouse_id"]
        ]);
        $goodstore->good=good::find($args["good_id"]);
        $goodstore->storehouse=storehouse::find($args["storehouse_id"]);
        $goodstore->message=trans("admin.the good was added to storehouse successfully");

        return $goodstore;

    }
}
