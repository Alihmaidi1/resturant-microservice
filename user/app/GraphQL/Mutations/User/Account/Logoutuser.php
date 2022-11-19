<?php

namespace App\GraphQL\Mutations\User\Account;

use Illuminate\Support\Facades\Auth;

final class Logoutuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $user=Auth::guard("api")->user();
        $user->message=trans("user.you are logout successfully");
        $user->token()->revoke();
        return $user;

    }
}
