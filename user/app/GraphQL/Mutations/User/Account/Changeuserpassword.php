<?php

namespace App\GraphQL\Mutations\User\Account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;

final class Changeuserpassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth('api_user')->user();
        $user->password=Hash::make($args["password"]);
        $user->reset_code=null;
        $user->save();
        auth('api_user')->logout();
        $user->message=trans("user.the password was updated successfully");
        $token=tokenInfo($user->email,$args['password'],"users");

        if($token->status()==200){

            $user->token_info=$token->json();
            return $user;

        }else{

            throw new CustomException(trans("user.we have error"));
        }


    }
}
