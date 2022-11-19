<?php

namespace App\Policies;

use App\Models\User;
use App\Models\suggest;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuggestPolicy
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
     * @param  \App\Models\suggest  $suggest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, suggest $suggest)
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

        if($user->resturant_id==$injected["resturant_id"]){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\suggest  $suggest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user,array $injected)
    {

        $suggest=suggest::find($injected["id"]);
        if($suggest->resturant_id==$user->resturant_id){

            return true;
        }else{

            return false;
        }

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\suggest  $suggest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user,array $injected)
    {

        $suggest=suggest::find($injected["id"]);
        if($suggest->user_id==$user->id){

            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\suggest  $suggest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, suggest $suggest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\suggest  $suggest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, suggest $suggest)
    {
        //
    }
}
