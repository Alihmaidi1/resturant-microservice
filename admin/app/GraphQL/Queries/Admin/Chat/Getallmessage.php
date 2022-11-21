<?php

namespace App\GraphQL\Queries\Admin\Chat;

use App\Models\chat;

final class Getallmessage
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $chat=chat::find($args["chat_id"]);
        return $chat->messages;

    }
}
