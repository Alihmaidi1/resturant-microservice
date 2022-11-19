<?php

namespace App\GraphQL\Mutations\User\Suggest;

use App\Models\suggest;

final class Deletesuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $suggest=suggest::find($args["id"]);
        $suggest1=$suggest;
        $suggest->delete();
        $suggest1->message=trans("user.the suggest was deleted successfully");
        return $suggest1;




    }
}
