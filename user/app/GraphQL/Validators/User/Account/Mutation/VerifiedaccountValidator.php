<?php

namespace App\GraphQL\Validators\User\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class VerifiedaccountValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "code"=>["required"]

        ];
    }


    public function messages(): array
    {
        return [


            "code.required"=>trans("user.code is required")

        ];
    }
}
