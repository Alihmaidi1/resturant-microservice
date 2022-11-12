<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;

final class Deletegoodstorehouse
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstore=goodstore::find($args["id"]);
        $goodstore1=$goodstore;
        $goodstore1->good=good::find($goodstore->good_id);
        $goodstore1->storehouse=good::find($goodstore->storehouse_id);
        $goodstore->delete();
        $goodstore1->message=trans("admin.the good was delete from this storehouse successfully");
        return $goodstore1;

    }
}
