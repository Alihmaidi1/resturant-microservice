<?php

namespace App\GraphQL\Validators\Admin\Banner\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetbannerwhereshowValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "resturant_id"=>["required","exists:resturants,id"],
            "where_show"=>["required"]
        ];
    }


    public function messages(): array
    {

        return [

            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "where_show.required"=>trans("admin.where show field is"),

        ];
    }
}
