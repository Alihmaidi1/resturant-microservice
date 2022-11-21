<?php

namespace App\GraphQL\Mutations\User\Message;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

final class Changereadmessages
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $response=Http::asForm()->post(env("ADMIN_APP_URL")."/api/readmessageuser",[

            "user_id"=>auth("api")->user()->id
        ]);

        if($response->status()==200){

            $message["message"]=trans("user.the message make read successfully");

            return $message;



        }else{

            throw new CustomException(trans("user.we have error"));
        }



    }
}
