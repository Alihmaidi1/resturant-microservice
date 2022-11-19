<?php

namespace App\GraphQL\Validators\User\Reservation\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetreservationValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [


            "code"=>["required","exists:reservations,code"]

        ];
    }

    public function messages(): array
    {
        return [

            "code.required"=>trans("user.code is required"),
            "code.exists"=>trans("user.code is not exists in our data")

        ];
    }
}
