<?php

namespace App\GraphQL\Queries\Admin\Chat;

use App\Exceptions\CustomException;
use App\Models\chat;
use App\Models\message;
use Illuminate\Support\Facades\Http;

final class Getchatresturant
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $chats=chat::where("resturant_id",$args["resturant_id"])->get();
        $arr=[];
        foreach($chats as $chat){
        $unread=message::where("sendBy",1)->where("status",0)->count();
        $chat->unreadnumber=$unread;
        $response=Http::asForm()->post(env("USER_APP_URL")."/api/getuser",[

            "id"=>$chat->user_id
        ]);
        if($response->status()==200){

            $chat->user=json_decode($response);
            $arr[]=$chat;

        }else{

            throw new CustomException(trans("admin.we have error"));
        }



        }

        return $arr;
    }
}
