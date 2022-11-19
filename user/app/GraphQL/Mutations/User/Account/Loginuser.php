<?php

namespace App\GraphQL\Mutations\User\Account;

use App\Exceptions\CustomException;
use App\Models\User;

final class Loginuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $token=tokenInfo($args['email'],$args['password'],"users");
        if($token->status()==200){

            $user=User::where("email",$args["email"])->where("resturant_id",$args["resturant_id"])->first();
            $user->token_info=$token->json();
            $user->message=trans("user.your are login successfully");
            return $user;

        }else{


            throw new CustomException(trans("user.The Email Or Password Is Not Correct"));

        }



    }
}
