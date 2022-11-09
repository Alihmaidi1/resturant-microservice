<?php

namespace App\GraphQL\Mutations\Admin\Account;

use App\Mail\resetmail;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

final class Resetemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $admin=admin::where("email",$args['email'])->first();
        $token=auth("reset_password")->login($admin);
        $number=rand(100000,999999);
        $admin->reset_code=Hash::make($number);
        $admin->save();
        Mail::to($args['email'])->send(new resetmail($number));
        $messages = new \stdClass();
        $messages->message=trans("admin.the Email Was Send To You Successfully");
        $messages->token=$token;
        return $messages;


    }
}
