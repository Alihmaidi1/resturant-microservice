<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\admin;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Config;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        foreach(Config::get("global.permssion") as $name=>$value){

            Gate::define($name,function(admin $admin) use($name){

                $permissions=$admin->role->permssions;
                foreach($permissions as $permission){

                    if($permission==$name){

                        return true;
                    }

                }

                return false;

            });

            }





        Passport::tokensExpireIn(Carbon::now()->addMinutes(60));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(5));

    }
}
