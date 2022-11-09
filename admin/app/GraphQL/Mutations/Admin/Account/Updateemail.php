<?php

namespace App\GraphQL\Mutations\Admin\Account;

final class Updateemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=auth()->user();
        $admin->email=$args["email"];
        $admin->save();
        $admin->message=trans("admin.the email was updated successfully");
        return $admin;

    }
}
