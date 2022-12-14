<?php

namespace App\Policies;

use App\Models\User;
use App\Models\wishlist;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Http;

class WishlistPolicy
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
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, wishlist $wishlist)
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

        $response=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

            "id"=>$injected["food_id"]

        ]);
        if($response->status()==200){

            return true;
        }else{

            return false;
        }



    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, array $injected)
    {




    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, array $injected)
    {

        $wishlist=wishlist::find($injected["id"]);
        $response=Http::asForm()->post(env("ADMIN_APP_URL")."/api/checkfoodid",[

            "id"=>$wishlist->food_id

        ]);
        if($response->status()==200){

            return true;
        }else{

            return false;
        }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, wishlist $wishlist)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, wishlist $wishlist)
    {
        //
    }
}
