<?php

use App\Http\Controllers\api\food;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\resturant;
use App\Http\Controllers\api\table;
use \App\Http\Controllers\api\message;
use \App\Http\Controllers\api\admin;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/checkresturantid",[resturant::class,"checkresturantid"]);
Route::post("/checkfoodid",[food::class,"checkfoodid"]);
Route::post("/checktableid",[table::class,"checktableid"]);
Route::post("/getallmessage",[message::class,"getallmessage"]);
Route::post("/getunreadmessage",[message::class,"getunreadmessage"]);
Route::post("/readmessageuser",[message::class,"readmessageuser"]);
Route::post("getuserinfo",[admin::class,"getadmin"])->middleware("auth:api");
