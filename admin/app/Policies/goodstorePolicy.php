<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\good;
use App\Models\User;
use App\Models\goodstore;
use App\Models\storehouse;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Arr;

class goodstorePolicy
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
     * @param  \App\Models\goodstore  $goodstore
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin, array $injected)
    {

        if($admin->role_id==1){


            return true;
        }

        $storehouse=storehouse::find($injected["storehouse_id"]);
        if($storehouse->resturant_id==$admin->resturant_id){

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
    public function create(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $resturant_good=good::find($injected["good_id"])->resturant_id;
        $resturant_storehouse=storehouse::find($injected["storehouse_id"])->resturant_id;
        if($admin->resturant_id==$resturant_good&&$admin->resturant_id==$resturant_storehouse){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\goodstore  $goodstore
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $goodstore=goodstore::find($injected["id"]);
        $resturant_good=good::find($goodstore->good_id);
        if($admin->resturant_id==$resturant_good){

            return true;
        }

        return false;

    }


    public function updateminQuantity(admin $admin,array $injected){


        if($admin->role_id==1){

            return true;
        }

        $goodstore=goodstore::find($injected["id"]);
        $resturant_good=good::find($goodstore->good_id);
        if($admin->resturant_id==$resturant_good){

            return true;
        }

        return false;

    }
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\goodstore  $goodstore
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin,array $injected)
    {


        if($admin->role_id==1){

            return true;
        }
        $goodstore=goodstore::find($injected["id"]);
        $resturant_good=good::find($goodstore->good_id)->resturant_id;
        if($resturant_good==$admin->resturant_id){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\goodstore  $goodstore
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, goodstore $goodstore)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\goodstore  $goodstore
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, goodstore $goodstore)
    {
        //
    }
}
