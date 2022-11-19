<?php

namespace App\GraphQL\Validators\User\Wishlist\Mutation;

use App\Rules\ExistInFood;
use Nuwave\Lighthouse\Validation\Validator;

final class AddwishlistValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "food_id"=>["required",new ExistInFood]

        ];

    }

    public function messages(): array
    {
        return [

            "food_id.required"=>trans("user.food id is required"),

        ];
    }


}
