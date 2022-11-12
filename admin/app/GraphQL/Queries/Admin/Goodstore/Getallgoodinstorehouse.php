<?php

namespace App\GraphQL\Queries\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;
use App\Models\storehouse;

final class Getallgoodinstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstores=goodstore::where("storehouse_id",$args["storehouse_id"])->get();
        $arr=[];
        foreach($goodstores as $goodstore){

            $goodstore->good=good::find($goodstore->good_id);
            $arr[]=$goodstore;
        }

        return $arr;
    }
}
