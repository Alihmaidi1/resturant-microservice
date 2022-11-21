<?php

namespace App\GraphQL\Queries\User\Message;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

final class Getunreadmessage
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $response=Http::asForm()->post(env("ADMIN_APP_URL")."/api/getunreadmessage",[

            "user_id"=>auth("api")->user()->id
        ]);

        if($response->status()==200){

            $count["count"]=json_decode($response);
            return $count;

        }else{

            throw new CustomException(trans("user.we have error"));
        }

    }
}
