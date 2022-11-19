<?php

namespace App\GraphQL\Mutations\User\Account;

use App\Exceptions\CustomException;
use App\Mail\resetmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Claims\Custom;

final class Createuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        try{

        $verified_code=rand(100000,999999);
        $user=User::create([
            "name"=>$args["name"],
            "code"=>rand(100000,999999),
            "email"=>$args["email"],
            "password"=>Hash::make($args["password"]),
            "status"=>0,
            "operation_code"=>Hash::make($verified_code),
            "copon_notification"=>0,
            "balance"=>0,
            "resturant_id"=>$args["resturant_id"]
        ]);

        Mail::to($args['email'])->send(new resetmail($verified_code));
        $user->message=trans("user.the account was created successfully");
        $user->operation_code=$verified_code;
        $token=tokenInfo($args["email"],$args["password"],"users");
        if($token->status()==200){

            $user->token_info=$token->json();
            return $user;

        }else{

            throw new CustomException(trans("user.we have error"));

        }


        }catch(\Exception $ex){

            throw new CustomException($ex->getMessage());

        }



    }
}
