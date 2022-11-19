<?php

namespace App\GraphQL\Mutations\User\Wishlist;

use App\Exceptions\CustomException;
use App\Models\wishlist;
use Illuminate\Support\Facades\Http;

final class Addwishlist
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)

    {

        $wishlist=wishlist::create([

            "food_id"=>$args["food_id"],
            "user_id"=>auth("api")->user()->id

        ]);
        $food=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

            "id"=>$args["food_id"]

        ]);
        if($food->status()==200){

        $wishlist->message=trans("user.the food was added to wishlist successfully");
        $food=json_decode($food);

        if(app()->getLocale()=="en"){

            $food->name=$food->name->en;
            $food->description=$food->description->en;

        }else{

            $food->name=$food->name->ar;
            $food->description=$food->description->ar;

        }

        $wishlist->food=$food;

        return $wishlist;

        }

        throw new CustomException(trans("user.we have error"));

    }
}
