<?php

namespace App\GraphQL\Queries\User\Suggest;

use App\Models\suggest;

final class Getsuggestinresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return suggest::where("resturant_id",$args["resturant_id"])->get();

    }
}
