<?php

namespace App\GraphQL\Mutations\User\Account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;
use stdClass;

final class Verifiedaccount
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("api")->user();
        if(Hash::check($args["code"],$user->operation_code)){

            $user->status=1;
            $user->operation_code=null;
            $user->save();
            $obj=new stdClass();

            $obj->message=trans("user.the account was verified successfully");
            return $obj;

        }else{

           throw new CustomException(trans("user.the code is not correct"));
        }


    }
}
