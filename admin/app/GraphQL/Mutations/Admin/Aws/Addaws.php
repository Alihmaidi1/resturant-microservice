<?php

namespace App\GraphQL\Mutations\Admin\Aws;

use App\Exceptions\CustomException;
use App\Models\aws;
use Illuminate\Support\Facades\Config;

final class Addaws
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $count=aws::where("resturant_id",$args["resturant_id"])->count();
        if($count==0){

            $aws=aws::create([

                "aws_access_key"=>$args["aws_access_key"],
                "aws_secret_access"=>$args["aws_secret_access"],
                "aws_region"=>$args["aws_region"],
                "aws_bucket"=>$args["aws_bucket"],
                "resturant_id"=>$args["resturant_id"]

            ]);
            $aws->message=trans("admin.the aws setting was created successfully");
            adddisk("resturant_".$args["resturant_id"],$aws->aws_access_key,$aws->aws_secret_access,$aws->aws_region,$aws->aws_bucket);
            return $aws;

        }else{

            throw new CustomException(trans("admin.we have error"));
        }

    }
}
