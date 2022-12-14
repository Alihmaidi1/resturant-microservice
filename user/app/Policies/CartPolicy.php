<?php

namespace App\Policies;

use App\Models\User;
use App\Models\cart;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Http;

class CartPolicy
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
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user,array $injected)
    {


        $food=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[
            "id"=>$injected["food_id"]
        ]);
        $food=json_decode($food);
        if($food->resturant_id==$user->resturant_id){

            return true;
        }

        return false;






    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, array $injected)
    {

        $cart=cart::find($injected["id"]);
        if($cart->user_id==$user->id){

            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user,array $injected)
    {
        $cart=cart::find($injected["id"]);
        if($cart->user_id==$user->id){

            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, cart $cart)
    {
        //
    }
}
