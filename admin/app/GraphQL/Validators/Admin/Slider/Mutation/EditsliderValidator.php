<?php

namespace App\GraphQL\Validators\Admin\Slider\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditsliderValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "logo"=>["required","mimes:png,jpg,jpeg"],
            "status"=>["required"],
            "rank"=>["required","unique:sliders,rank"],
            "resturant_id"=>["required","exists:resturants,id"],
            "id"=>["required","exists:sliders,id"]


        ];
    }


    public function messages(): array
    {
        return [

            "logo.required"=>trans("admin.logo is required"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "status.required"=>trans("admin.status is required"),
            "rank.required"=>trans("admin.rank is required"),
            "rank.unique"=>trans("admin.rank is exists in our data"),
            "resturant_id.required"=>trans("admin.resturant id is not required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "id.required"=>trans("admin.id is required"),
            "id.exists"=>trans("admin.id is not exists in our data")

        ];
    }

}
