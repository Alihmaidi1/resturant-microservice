<?php

namespace App\GraphQL\Validators\User\Suggest\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EditsuggestValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "id"=>["required","exists:suggests,id"],
            "description"=>["required"]

        ];
    }

    public function messages(): array
    {
        return [

            "id.required"=>trans("user.id is required"),
            "id.exists"=>trans("user.id is not exists in our data"),
            "description.required"=>trans("user.description is required")


        ];
    }



}
