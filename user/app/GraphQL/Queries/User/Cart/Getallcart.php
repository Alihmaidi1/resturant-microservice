<?php

namespace App\GraphQL\Queries\User\Cart;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

final class Getallcart
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $carts=auth("api")->user()->carts;
        // return $wishlists;
        $arr=[];
        foreach($carts as $cart){

            $food=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

                "id"=>$cart->food_id

            ]);
            if($food->status()==200){

                $food=json_decode($food);

                if(app()->getLocale()=="en"){

                    $food->name=$food->name->en;
                    $food->description=$food->description->en;

                }else{

                    $food->name=$food->name->ar;
                    $food->description=$food->description->ar;

                }

                $cart->food=$food;
                $arr[]=$cart;

            }else{

                throw new CustomException(trans("user.we have error"));

            }

        }


        return $arr;


    }
}
