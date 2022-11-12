<?php

namespace App\GraphQL\Validators\Admin\Banner\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddbannerValidator extends Validator
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
            "rank"=>["required","unique:banners,rank"],
            "url"=>["required","url"],
            "where_show"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"]

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
            "url.required"=>trans("admin.url is required"),
            "url.url"=>trans("admin.url field should be url"),
            "where_show.required"=>trans("admin.where show field is"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")

        ];
    }
}
