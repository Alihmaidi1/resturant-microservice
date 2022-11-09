<?php

namespace App\GraphQL\Mutations\Admin\Account;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("api")->user();
        $user->message=trans("admin.you are logout successfully");
        $user->token()->revoke();
        return $user;

    }
}
