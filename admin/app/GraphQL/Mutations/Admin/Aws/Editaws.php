<?php

namespace App\GraphQL\Mutations\Admin\Aws;

use App\Models\aws;

final class Editaws
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $aws=aws::find($args["id"]);
        deletedisk("resturant_".$aws->resturant_id);
        $aws->aws_access_key=$args["aws_access_key"];
        $aws->aws_secret_access=$args["aws_secret_access"];
        $aws->aws_region=$args["aws_region"];
        $aws->aws_bucket=$args["aws_bucket"];
        $aws->save();
        adddisk("resturant_".$aws->resturant_id,$aws->aws_access_key,$aws->aws_secret_access,$aws->aws_region,$aws->aws_bucket);
        $aws->message=trans("admin.the aws setting was updated successfully");
        return $aws;
    }
}
