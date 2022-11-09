<?php

namespace App\GraphQL\Validators\Admin\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class TokenValidator extends Validator
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

            "your_refresh_token.required"=>trans("admin.refresh token is required")

        ];
    }
}
