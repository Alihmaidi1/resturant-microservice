<?php

namespace Database\Seeders;

use App\Models\admin;
use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class superadmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arr=config("global.permssion");
        $arr1=[];
        foreach($arr as $key=>$value){

            $arr1[]=$key;

        }
        $role=role::create([

            "name"=>["en"=>"Super Admin","ar"=>"أدمن بتحكم كامل"],
            "permssions"=>json_encode($arr1)

        ]);



        admin::create([

            "email"=>"alihmaidi095@gmail.com",
            "password"=>bcrypt("ali450892") ,
            "role_id"=>$role->id,
            "rank"=>0
        ]);

    }
}
