<?php

namespace App\GraphQL\Mutations\User\Reservation;

use App\Exceptions\CustomException;
use App\Models\reservation;
use App\repo\Paypal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

final class Editreservation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        DB::beginTransaction();
        try{



            $reservation=reservation::where("start","<=",$args["start"])->where("end",">=",$args["end"])->where("table_id",$args["table_id"])->where("status",1)->count();
            if($reservation!=0){
                throw new CustomException(trans("user.this table is reservated at this time"));

            }else{
                $reservation=reservation::find($args["id"]);
                if($reservation->status==1){

                throw new CustomException(trans("admin.we have error"));

                }
                $reservation->table_id=$args["table_id"];
                $reservation->name=$args["name"];
                $reservation->start=$args["start"];
                $reservation->end=$args["end"];
                $reservation->save();
                $table=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checktableid",[
                    "id"=>$args["table_id"]
                ]);
                if($table->status()==200){

                $table=json_decode($table);
                $price=$table->type->price;
                $total=getTotalPrice($args["start"],$args["end"],$price);
                $reservation->price=$total;
                $currency=$table->type->currency;

                if(app()->getLocale()=="ar"){

                    $currency->name=$currency->name->ar;
                    $table->description=$table->description->ar;
                }else{

                    $currency->name=$currency->name->en;
                    $table->description=$table->description->en;

                }
                $reservation->currency=$currency;
                $reservation->table=$table;
                $paypal=new Paypal($total,"USD");
                $reservation->paymentUrl=$paypal->getLink($reservation->id);
                $reservation->message=trans("user.the reservation was updated successfully and you need to continue the reservation by payment");
                DB::commit();
                return $reservation;

                }


        }

        }catch(\Exception $ex){

            DB::rollBack();
            throw new CustomException($ex->getMessage());

        }


    }
}
