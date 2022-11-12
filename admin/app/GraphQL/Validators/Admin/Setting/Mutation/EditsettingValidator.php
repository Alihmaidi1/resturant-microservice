<?php

namespace App\GraphQL\Validators\Admin\Setting\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditsettingValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "currency_id"=>["required","exists:currencies,id"],
            "resturant_id"=>["required","exists:resturants,id"],
            "meta_logo"=>["mimes:jpg,jpeg,png"],
            "logo"=>["mimes:jpg,jpeg,png"],

        ];
    }


    public function messages(): array
    {
        return [

            "currency_id.exists"=>trans("admin.currency id is not exists in our data"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "meta_logo.mimes"=>trans("admin.meta logo should be image")

        ];
    }
}
