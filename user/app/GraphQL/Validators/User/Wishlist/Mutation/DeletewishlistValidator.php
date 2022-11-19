<?php

namespace App\GraphQL\Validators\User\Wishlist\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class DeletewishlistValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "id"=>["required","exists:wishlists,id"]
        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("user.id is required"),
            "id.exists"=>trans("user.id is not exists in our data")

        ];
    }
}
