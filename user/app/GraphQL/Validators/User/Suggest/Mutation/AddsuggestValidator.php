<?php

namespace App\GraphQL\Validators\User\Suggest\Mutation;

use App\Rules\ExistInResturant;
use Nuwave\Lighthouse\Validation\Validator;

final class AddsuggestValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "description"=>["required"],
            "resturant_id"=>["required",new ExistInResturant]

        ];
    }

    public function messages(): array
    {
        return [

            "description.required"=>trans("user.description is required"),
            "resturant_id.required"=>trans("user.resturant id is required")


        ];
    }
}
