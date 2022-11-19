<?php

namespace App\GraphQL\Mutations\User\Suggest;

use App\Models\suggest;

final class Editsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $suggest=suggest::find($args["id"]);
        $suggest->description=$args["description"];
        $suggest->save();
        $suggest->message=trans("user.the suggest was updated successfully");
        return $suggest;

    }
}
