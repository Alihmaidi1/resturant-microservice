<?php

namespace App\GraphQL\Mutations\User\Wishlist;

use App\Models\wishlist;

final class Deletewishlist
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $wishlist=wishlist::find($args["id"]);
        $wishlist1=$wishlist;
        $wishlist->delete();
        $wishlist1->message=trans("user.the wishlist was deleted successfully");
        return $wishlist1;


    }
}
