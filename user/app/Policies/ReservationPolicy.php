<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reservation;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user,array $injected)
    {
        $reservation=reservation::find($injected["id"]);
        if($reservation->user_id==$user->id){

            return true;
        }

        return false;


    }

    public function code(User $user,array $injected)
    {

        $reservation=reservation::where("code",$injected["code"])->first();
        if($reservation->user_id==$user->id){

            return true;
        }

        return false;



    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user,array $injected)
    {

        $table=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checktableid",[
            "id"=>$injected["table_id"]
        ]);
        $table=json_decode($table);
        if($table->resturant_id==$user->resturant_id){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, array $injected)
    {

        $table=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checktableid",[
            "id"=>$injected["table_id"]
        ]);
        $table=json_decode($table);

        $reservation=reservation::find($injected["id"]);
        $table=json_decode($table);
        $reservation=reservation::find($injected["id"]);

        if($table->resturant_id==$user->resturant_id&& $reservation->user_id==$user->id){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, array $injected)
    {

        $reservation=reservation::find($injected["id"]);
        $table=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checktableid",[
            "id"=>$reservation->table_id
        ]);
        $table=json_decode($table);
        if($table->resturant_id==$user->resturant_id){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, reservation $reservation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\reservation  $reservation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, reservation $reservation)
    {
        //
    }
}
