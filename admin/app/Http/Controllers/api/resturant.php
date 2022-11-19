<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\resturant as ModelsResturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class resturant extends Controller
{



    public function checkresturantid(Request $request){


        $count=ModelsResturant::where("id",$request->id)->count();
        if($count==0){

            $resturant=Cache::rememberForever("resturant:".$request->id,function() use($request){

                return ModelsResturant::find($request->id);

            });
            return response()->json($resturant,401);

        }else{

            return response()->json([],200);

        }




    }

}
