<?php

namespace App\GraphQL\Validators\User\Account\Mutation;

use App\Rules\ExistInResturant;
use Nuwave\Lighthouse\Validation\Validator;

final class LoginuserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "email"=>["required","email"],
            "password"=>["required"],
            "resturant_id"=>["required","exists:users,resturant_id"]

        ];
    }

    public function messages(): array
    {
        return [

            "email.required"=>trans("user.email is required"),
            "password.required"=>trans("user.password is required"),
            "email.email"=>trans("user.email field should be email"),
            "resturant_id.required"=>trans("user.resturant id is required")

        ];
    }

}
