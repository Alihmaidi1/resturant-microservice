<?php

namespace App\GraphQL\Validators\Admin\Currency\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddcurrencyinresturantValidator extends Validator
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
            "currency_id"=>["required","exists:currencies,id"],
            "is_default"=>["required"]
        ];
    }


    public function messages(): array
    {
        return [

            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "currency_id.required"=>trans("admin.currency id is required"),
            "currency_id.exists"=>trans('admin.currency id is not exists in our data'),
            "is_default.required"=>trans("admin.is default fpr website is required")

        ];
    }
}
