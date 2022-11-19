<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\aws;
use App\Models\category;
use App\Models\currency;
use App\Models\User;
use App\Models\food;
use App\Models\setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class foodPolicy
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
     * @param  \App\Models\food  $food
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, food $food)
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


        $count=setting::where("resturant_id",$injected["resturant_id"])->count();
        if($count==0){

            return false;
        }


        $aws=aws::where("resturant_id",$injected["resturant_id"])->count();
        if($aws==0){

            return false;
        }

        if($admin->role_id==1){

            return true;
        }
        $category=category::find($injected["category_id"]);
        $currency=currency::find($injected["currency_id"]);
        if($admin->resturant_id==$injected["resturant_id"]&&$category->resturant_id==$admin->resturant_id&&$currency->resturant_id==$admin->resturant_id){

            return true;
        }

        return false;


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\food  $food
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(admin $admin, array $injected)
    {


        $count=setting::where("resturant_id",$injected["resturant_id"])->count();
        if($count==0){

            return false;
        }

        $aws=aws::where("resturant_id",$injected["resturant_id"])->count();
        if($aws==0){

            return false;
        }

        if($admin->role_id==1){

            return true;

        }
        $food=food::find($injected["id"]);
        $old_resturant=$food->resturant;
        $old_currency=$food->currency;
        $old_category=$food->category;
        $new_resturant=$injected["resturant_id"];
        $new_currency=currency::find($injected["currency_id"]);
        $new_category=category::find($injected["category_id"]);

        if($admin->resturant_id==$old_resturant&&$admin->resturant_id==$old_currency&& $admin->resturant_id==$old_category
        &&$admin->resturant_id==$new_resturant&& $admin->resturant_id==$new_currency&&$admin->resturant_id==$new_category
        ){

            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\food  $food
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(admin $admin,array $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        $food=food::find($injected["id"]);
        if($admin->resturant_id==$food->resturant_id){

            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\food  $food
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, food $food)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\food  $food
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, food $food)
    {
        //
    }
}
