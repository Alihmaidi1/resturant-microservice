<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;
use stdClass;

final class Checkresetcode
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=auth("reset_password")->user();
        if(Hash::check($args["code"],$admin->reset_code)){

            $admin->reset_code=null;
            $admin->save();
            $messages=new stdClass();
            $messages->message=trans("admin.the code is correct");
            return $messages;
        }else{

            throw new CustomException(trans("admin.we have error"));

        }

    }
}
