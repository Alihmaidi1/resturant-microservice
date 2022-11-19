<?php

namespace App\GraphQL\Validators\Admin\Aws\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddawsValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "aws_access_key"=>["required"],
            "aws_secret_access"=>["required"],
            "aws_region"=>["required"],
            "aws_bucket"=>["required"],
            "resturant_id"=>["required","exists:resturants,id"]

        ];
    }


    public function messages(): array
    {
        return [

            "aws_access_key.required"=>trans("admin.aws access key is required"),
            "aws_secret_access.required"=>trans("admin.aws secret access is required"),
            "aws_region.required"=>trans("admin.aws region is required"),
            "aws_bucket.required"=>trans("admin.aws bucket is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data")


        ];
    }
}
