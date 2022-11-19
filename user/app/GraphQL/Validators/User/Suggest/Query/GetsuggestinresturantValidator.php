<?php

namespace App\GraphQL\Validators\User\Suggest\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetsuggestinresturantValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "resturant_id"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "resturant_id.required"=>trans("user.resturant id is required")

        ];
    }
}
