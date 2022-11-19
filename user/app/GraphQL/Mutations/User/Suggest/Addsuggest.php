<?php

namespace App\GraphQL\Mutations\User\Suggest;

use App\Models\suggest;

final class Addsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("api")->user();
        $suggest=suggest::create([
            "description"=>$args["description"],
            "user_id"=>$user->id,
            "resturant_id"=>$args["resturant_id"]
        ]);

        $suggest->message=trans("user.the suggest was created successfully");
        return $suggest;




    }
}
