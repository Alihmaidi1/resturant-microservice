<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\cart;
use App\Models\food;
use App\Models\reservation;
use App\Models\suggest;
use App\Models\User;
use App\Models\wishlist;
use App\Policies\CartPolicy;
use App\Policies\foodPolicy;
use App\Policies\ReservationPolicy;
use App\Policies\SuggestPolicy;
use App\Policies\WishlistPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        suggest::class=>SuggestPolicy::class,
        wishlist::class=>WishlistPolicy::class,
        reservation::class=>ReservationPolicy::class,
        cart::class=>CartPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define("isactiveuser",function(User $user){

            if($user->status==1){

                return true;
            }

            return false;

        });

    }
}
