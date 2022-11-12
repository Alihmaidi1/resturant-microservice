<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\admin;
use App\Models\banner;
use App\Models\category;
use App\Models\currency;
use App\Models\currency_resturant;
use App\Models\employee;
use App\Models\employee_experience;
use App\Models\food;
use App\Models\good;
use App\Models\goodstore;
use App\Models\job;
use App\Models\setting;
use App\Models\slider;
use App\Models\storehouse;
use App\Models\table;
use App\Models\tabletype;
use App\Policies\adminPolicy;
use App\Policies\bannerPolicy;
use App\Policies\categoryPolicy;
use App\Policies\currencyPolicy;
use App\Policies\employeePolicy;
use App\Policies\experiencePolicy;
use App\Policies\foodPolicy;
use App\Policies\goodPolicy;
use App\Policies\goodstorePolicy;
use App\Policies\jobPolicy;
use App\Policies\settingPolicy;
use App\Policies\sliderPolicy;
use App\Policies\storehousePolicy;
use App\Policies\tablePolicy;
use App\Policies\tabletypePolicy;
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
        employee_experience::class=>experiencePolicy::class,
        employee::class=>employeePolicy::class,
        category::class=>categoryPolicy::class,
        currency::class=>currencyPolicy::class,
        tabletype::class=>tabletypePolicy::class,
        table::class=>tablePolicy::class,
        storehouse::class=>storehousePolicy::class,
        good::class=>goodPolicy::class,
        goodstore::class=>goodstorePolicy::class,
        slider::class=>sliderPolicy::class,
        banner::class=>bannerPolicy::class,
        food::class=>foodPolicy::class,
        setting::class=>settingPolicy::class


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
