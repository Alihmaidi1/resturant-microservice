<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Exceptions\CustomException;
use App\Models\admin;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $token=tokenInfo($args['email'],$args['password'],"admins");
        if($token->status()==200){
        $admin=admin::where("email",$args["email"])->first();
        $admin->token_info=$token->json();
        $admin->message=trans("admin.your are login successfully");
        return $admin;

        }else{
            throw new CustomException($token);
        }







    }
}
