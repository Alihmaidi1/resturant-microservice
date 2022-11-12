<?php

namespace App\GraphQL\Validators\Admin\Good\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddgoodValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name_en"=>["required"],
            "name_ar"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"]
        ];
    }


    public function messages(): array
    {
        return [

            "name_en.required"=>trans("admin.name in english is required"),
            "name_ar.required"=>trans("admin.name in arabic is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),

        ];
    }
}
