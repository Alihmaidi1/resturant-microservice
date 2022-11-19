<?php

namespace App\GraphQL\Queries\User\Suggest;

final class Getallsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        return auth("api")->user()->suggests;

    }
}
