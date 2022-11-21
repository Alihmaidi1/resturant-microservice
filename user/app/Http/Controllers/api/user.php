<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class user extends Controller
{


    public function getuser(Request $request){

        $user=ModelsUser::find($request->id);
        if($user==null){

            return response()->json([],401);
        }else{


            return response()->json($user,200);
        }

    }


    public function getuserinfo(Request $request){


        return auth("api")->user();

    }



    public function getusercount(Request $request){


        $user=ModelsUser::find($request->id);
        if($user!=null){

            return response()->json($user,200);
        }else{

            return response()->json([],401);
        }


    }


}
