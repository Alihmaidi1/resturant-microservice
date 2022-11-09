<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\currency_resturant;
use Illuminate\Auth\Access\HandlesAuthorization;

class currencyPolicy
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
     * @param  \App\Models\currency_resturant  $currencyResturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, currency_resturant $currencyResturant)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }
        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\currency_resturant  $currencyResturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, currency_resturant $currencyResturant)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\currency_resturant  $currencyResturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin, array $injected)
    {
        return true;
        if($admin->role_id==1){

            return true;
        }
        $currency_resturant=currency_resturant::find($injected["id"]);
        if($admin->resturant_id==$currency_resturant->resturant_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\currency_resturant  $currencyResturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, currency_resturant $currencyResturant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\currency_resturant  $currencyResturant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, currency_resturant $currencyResturant)
    {
        //
    }
}
