<?php

namespace App\GraphQL\Validators\User\Cart\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditcartquantityValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:carts,id"],
            "quantity"=>["required"]
        ];
    }


    public function messages(): array
    {
        return [

            "id.required"=>trans("user.id is required"),
            "id.exists"=>trans("user.id is not exists in our data"),
            "quantity.required"=>trans("user.quantity is required")

        ];
    }


}
