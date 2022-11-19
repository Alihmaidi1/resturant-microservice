<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\table as ModelsTable;
use App\Models\tabletype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class table extends Controller
{


    public function checktableid(Request $request){


        $count=ModelsTable::where("id",$request->id)->count();
        if($count==0){

            return response()->json([],401);
        }else{

            $table=Cache::rememberForever("table:".$request->id,function() use($request){

                $table=ModelsTable::find($request->id);
                $type=tabletype::with("currency")->find($table->type_id);
                $table->type=$type;
                return $table;
            });

            return response()->json($table,200);
        }






    }
}
