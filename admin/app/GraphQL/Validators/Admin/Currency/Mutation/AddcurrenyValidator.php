<?php

namespace App\GraphQL\Validators\Admin\Currency\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddcurrenyValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "code"=>["required"],
            "name_en"=>["required"],
            "name_ar"=>["required"],
            "precent_value_in_dular"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"],
            "is_default"=>["required"]

        ];
    }


    public function messages(): array
    {

        return [

            "code.required"=>trans("admin.the code is required"),
            "code.exists"=>trans("admin.the currency is already exists"),
            "name_en.required"=>trans("admin.the name in english is required"),
            "name_ar.required"=>trans("admin.the name in arabic is required"),
            "precent_value_in_dular.required"=>trans("admin.the precent value in dular is required"),
            "resturant_id.required"=>trans("admins.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "is_default.required"=>trans("admin.is default is required")
        ];


    }


}
