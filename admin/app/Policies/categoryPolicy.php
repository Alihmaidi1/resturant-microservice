<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\aws;
use App\Models\User;
use App\Models\category;
use Illuminate\Auth\Access\HandlesAuthorization;

class categoryPolicy
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(admin $admin,$injected)
    {

        $aws=aws::where("resturant_id",$injected["resturant_id"])->count();
        if($aws==0){

            return false;
        }


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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {

        $aws=aws::where("resturant_id",$injected["resturant_id"])->count();
        if($aws==0){

            return false;
        }

        if($admin->role_id==1){

            return true;
        }

        $category=category::find($injected["id"]);
        if($admin->resturant_id==$injected["resturant_id"]&&$admin->resturant_id==$category->resturant_id){

            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin, array $injected)
    {

        if($admin->role_id==1){

            return true;
        }
        $category=category::find($injected["id"]);
        if($admin->resturant_id==$category->resturant_id){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, category $category)
    {
        //
    }
}
