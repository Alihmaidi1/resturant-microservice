<?php

namespace App\GraphQL\Mutations\User\Account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;
use stdClass;

final class Checkresetcodeuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("api_reset")->user();
        if(Hash::check($args["code"],$user->reset_code)){

            $user->reset_code=null;
            $user->save();
            $messages=new stdClass();

            $messages->message=trans("user.the code is correct");
            return $messages;
        }else{


            throw new CustomException(trans("user.code not correct"));

        }


    }
}
