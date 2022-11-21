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


    public function getunreadmessage(Request $request){


        $chat=chat::where("user_id",$request->user_id)->where("sendBy",0)->first();
        if($chat!=null){

            $messages=$chat->messages;
            $count=0;
            foreach($messages as $message){

                if($message->status==0){

                    $count++;
                }

                return response()->json($count,200);
        }
        }else{


            return response()->json([],401);
        }

    }



    public function readmessageuser(Request $request){


        $chat=chat::where("user_id",$request->user_id)->first();
        if($chat!=null){


            $messages=$chat->messages;

        foreach($messages as $message){

            $message->status=1;
            $message->save();

        }
        return response()->json([],200);

        }

        return response()->json([],401);



    }



}
