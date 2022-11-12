<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\currency;
use App\Models\currency_resturant;
use App\Models\User;
use App\Models\job;
use Illuminate\Auth\Access\HandlesAuthorization;

class jobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(admin $admin,array $injected)
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
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, job $job)
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
        $currency=currency::find($injected["currency_id"]);
        if($admin->resturant_id==$injected["resturant_id"]&& $admin->resturant_id==$currency->resturant_id){

            return true;
        }

        return false;





    }


    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $job=job::find($injected["id"]);
        $currency=currency::find($injected["currency_id"]);
        if($admin->resturant_id==$injected["resturant_id"]&& $admin->resturant_id==$currency->resturant_id &&$admin->resturant_id==$job->resturant_id){

            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin,array $injected)
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
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, job $job)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\job  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, job $job)
    {
        //
    }
}
