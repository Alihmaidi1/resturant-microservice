<?php

namespace App\GraphQL\Queries\Admin\Employee;

use App\Models\employee;

final class Getemployee
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return employee::find($args["id"]);
    }
}
