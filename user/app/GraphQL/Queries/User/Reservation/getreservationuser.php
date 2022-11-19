<?php

namespace App\GraphQL\Queries\User\Reservation;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

final class getreservationuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $reservations=auth("api")->user()->reservations;
        $arr=[];
        foreach($reservations as $reservation){


                    $table=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checktableid",[
                        "id"=>$reservation->table_id
                    ]);

                    if($table->status()==200){
                        $table=json_decode($table);
                        $currency=$table->type->currency;
                        if(app()->getLocale()=="ar"){


                            $currency->name=$currency->name->ar;
                            $table->description=$table->description->ar;

                        }else{

                            $currency->name=$currency->name->en;
                            $table->description=$table->description->en;

                        }
                        $reservation->price=getTotalPrice($reservation->start,$reservation->end,$table->type->price);
                        $reservation->currency=$currency;
                        $reservation->table=$table;
                        $reservation->message=trans("user.the data was fetched successfully");
                        $arr[]=$reservation;


                    }else{

                        throw new CustomException(trans("user.we have error"));
                    }





        }

        return $arr;

    }
}
