<?php

namespace App\GraphQL\Mutations\Admin\Chat;

use App\Models\chat;

final class Readdone
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $chat=chat::find($args["chat_id"]);
        $messages=$chat->messages;
        foreach($messages as $message){

            $message->status=1;
            $message->save();

        }
        $arr["message"]=trans("admin.the message made read successfully");

        return $arr;
    }
}
