<?php

namespace App\GraphQL\Validators\User\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class RefreshtokenuserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "your_refresh_token"=>["required"]
        ];
    }

    public function messages(): array
    {
        return [

            "your_refresh_token.required"=>trans("user.refresh token is required")

        ];
    }
}
