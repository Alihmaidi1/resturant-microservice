<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\food as ModelsFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class food extends Controller
{



    public function checkfoodid(Request $request){

        $count=ModelsFood::where("id",$request->id)->count();
        if($count==0){

            return response()->json("",401);

        }else{

            $food=Cache::rememberForever("food:".$request->id,function($request){

                return ModelsFood::find($request->id);
            });
            return response()->json($food,200);

        }



    }



}
