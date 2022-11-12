<?php

namespace App\GraphQL\Mutations\Admin\Goodstore;

use App\Models\good;
use App\Models\goodstore;

final class Editgoodstore
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $goodstore=goodstore::find($args["id"]);
        $goodstore->quantity=$args["quantity"];
        $goodstore->save();
        $goodstore->good=good::find($goodstore->good_id);
        $goodstore->storehouse=good::find($goodstore->storehouse_id);
        $goodstore->message=trans("admin.the quantity of good was updated successfully in this storehouse");
        return $goodstore;
    }
}
