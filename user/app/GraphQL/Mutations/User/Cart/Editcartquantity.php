<?php

namespace App\GraphQL\Mutations\User\Cart;

use App\Exceptions\CustomException;
use App\Models\cart;
use Illuminate\Support\Facades\Http;

final class Editcartquantity
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $cart=cart::find($args["id"]);
        $cart->quantity=$args["quantity"];
        $food=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

            "id"=>$cart->food_id

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
