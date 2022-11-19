<?php

namespace App\GraphQL\Validators\User\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class SendmailuserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "email"=>["required","exists:users,email"],
            "resturant_id"=>["required","exists:users,resturant_id"]


        ];
    }


    public function messages(): array
    {
        return[

            "email.required"=>trans("user.email is required"),
            "email.exists"=>trans("user.email is not exists in our data"),
            "resturant_id.required"=>trans("user.resturant id is required"),
            "resturant_id.exists"=>trans("user.this resturant is not have this account")

        ];
    }
}
