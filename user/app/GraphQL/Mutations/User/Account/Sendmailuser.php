<?php

namespace App\GraphQL\Mutations\User\Account;

use App\Mail\resetmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

final class Sendmailuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=User::where("email",$args['email'])->where("resturant_id",$args["resturant_id"])->first();
        $token=auth("api_reset")->login($user);
        $reset_code=rand(100000,999999);
        $user->reset_code=Hash::make($reset_code);
        $user->save();
        Mail::to($args['email'])->send(new resetmail($reset_code));
        $messages = new \stdClass();
        $messages->message=trans("user.the Email Was Send To You Successfully");
        $messages->token=$token;
        return $messages;

    }
}
