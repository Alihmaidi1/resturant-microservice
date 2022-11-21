<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\chat;
use Illuminate\Http\Request;

class message extends Controller

{

    public function getallmessage(Request $request){


        $chat=chat::where("user_id",$request->user_id)->first();
        if($chat!=null){
            $messages=$chat->messages;
            return  response()->json($messages,200);

        }else{

            return response()->json([],401);
        }



    }

}
