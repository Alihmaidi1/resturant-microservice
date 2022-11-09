<?php

namespace App\GraphQL\Validators\Admin\Job\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddjobValidator extends Validator
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
            "salary"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"],
            "currency_resturant_id"=>["required","exists:currency_resturants,id"]

        ];
    }

    public function messages(): array
    {

        return [

            "name_ar.required"=>trans("admin.name in arabic is required"),
            "name_en.required"=>trans("admin.name in english is required"),
            "salary.required"=>trans("admin.salary is required"),
            "currency_resturant_id.required"=>trans("admin.currency id is required"),
            "currency_resturant_id.exists"=>trans("admin.currency is not exists in our data"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")
        ];
    }


}
