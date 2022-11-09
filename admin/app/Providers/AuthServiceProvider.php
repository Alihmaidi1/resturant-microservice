<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\admin;
use App\Models\currency_resturant;
use App\Models\employee_experience;
use App\Models\job;
use App\Policies\adminPolicy;
use App\Policies\currencyPolicy;
use App\Policies\experiencePolicy;
use App\Policies\jobPolicy;
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

        currency_resturant::class=>currencyPolicy::class,
        admin::class=>adminPolicy::class,
        job::class=>jobPolicy::class,
        employee_experience::class=>experiencePolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define("isadmin",function(admin $admin){

            if($admin->resturant_id==null){

                return true;
            }else{

                return false;
            }

        });

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
