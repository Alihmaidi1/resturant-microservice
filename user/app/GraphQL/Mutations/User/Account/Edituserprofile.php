<?php

namespace App\GraphQL\Mutations\User\Account;

final class Edituserprofile
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("api")->user();
        $user->name=$args["name"];
        $user->copon_notification=$args["copon_notification"];
        $user->save();
        $user->message=trans("user.the profile was updated successfully");
        return $user;


    }
}
