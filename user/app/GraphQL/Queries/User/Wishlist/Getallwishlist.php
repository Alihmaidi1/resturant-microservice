<?php

namespace App\GraphQL\Queries\User\Wishlist;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

final class Getallwishlist
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $wishlists=auth("api")->user()->wishlists;
        // return $wishlists;
        $arr=[];
        foreach($wishlists as $wishlist){


            $food=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

                "id"=>$wishlist->food_id

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

                $wishlist->food=$food;
                $arr[]=$wishlist;

            }else{

                throw new CustomException(trans("user.we have error"));
            }

        }


        return $arr;
    }
}
