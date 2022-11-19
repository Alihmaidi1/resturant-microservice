<?php

namespace App\GraphQL\Mutations\User\Reservation;

use App\Models\reservation;

final class Deletereservation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $reservation=reservation::find($args["id"]);
        $reservation1=$reservation;
        $reservation->delete();
        $reservation1->message=trans("user.the reservation was deleted successfully");
        return $reservation1;


    }
}
