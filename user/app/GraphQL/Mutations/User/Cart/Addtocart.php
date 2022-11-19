<?php

namespace App\GraphQL\Mutations\User\Cart;

use App\Exceptions\CustomException;
use App\Models\cart;
use Illuminate\Support\Facades\Http;

final class Addtocart
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $cart=cart::create([

            "food_id"=>$args["food_id"],
            "quantity"=>$args["quantity"],
            "user_id"=>auth("api")->user()->id

        ]);
        $food=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

            "id"=>$args["food_id"]

        ]);


            if($food->status()==200){

                    $cart->message=trans("user.the food in resturant was added to cart successfully");
                    $food=json_decode($food);
                    if(app()->getLocale()=="en"){

                        $food->name=$food->name->en;
                        $food->description=$food->description->en;

                    }else{

                        $food->name=$food->name->ar;
                        $food->description=$food->description->ar;

                    }

                    $cart->food=$food;
                    return $cart;

            }

            throw new CustomException(trans("user.we have error"));


    }
}
