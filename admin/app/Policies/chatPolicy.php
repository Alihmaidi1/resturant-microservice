<?php

namespace App\Policies;

use App\Models\admin;
use App\Models\User;
use App\Models\chat;
use Illuminate\Auth\Access\HandlesAuthorization;

class chatPolicy
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
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(admin $admin, $injected)
    {

        if($admin->role_id==1){

            return true;
        }

        if($admin->resturant_id==$injected["resturant_id"]){

            return true;
        }


        return false;



    }



    public function getmessage(admin $admin,$injected){


        if($admin->role_id==1){

            return true;
        }

        $chat=chat::find($injected["chat_id"]);
        if($admin->resturant_id==$chat->resturant_id){

            return true;
        }

        return false;

    }

    public function readdone(admin $admin,$injected){


        if($admin->role_id==1){

            return true;
        }

        $chat=chat::find($injected["chat_id"]);
        if($admin->resturant_id==$chat->resturant_id){

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
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, chat $chat)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, chat $chat)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, chat $chat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\chat  $chat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, chat $chat)
    {
        //
    }
}
