<?php

namespace App\GraphQL\Validators\User\Reservation\Query;

use App\Rules\ExistInTable;
use Nuwave\Lighthouse\Validation\Validator;

final class GetreservationindayValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "table_id"=>["required",new ExistInTable],
            "day"=>["required","date"]
        ];
    }



    public function messages(): array
    {

        return [

            "table_id.required"=>trans("user.id is required"),
            "table_id.exists"=>trans("user.id is not exists in our data"),
            "day.required"=>trans("user.day field is required"),
            "day.date"=>trans("user.day field should be date")

        ];
    }

}
