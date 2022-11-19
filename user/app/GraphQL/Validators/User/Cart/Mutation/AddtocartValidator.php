<?php

namespace App\GraphQL\Validators\User\Cart\Mutation;

use App\Rules\ExistInFood;
use Nuwave\Lighthouse\Validation\Validator;

final class AddtocartValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "quantity"=>["required"],
            "food_id"=>["required",new ExistInFood]

        ];
    }

    public function messages(): array
    {
        return [

            "quantity.required"=>trans("user.quantity is required"),
            "food_id.required"=>trans("user.food id is required"),

        ];
    }
}
