<?php

namespace App\GraphQL\Validators\User\Reservation\Mutation;

use App\Rules\ExistInTable;
use Nuwave\Lighthouse\Validation\Validator;

final class AddreservationValidator extends Validator
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
            "name"=>["required"],
            "start"=>["required","date","after_or_equal:".date("Y-m-d H:i:s")],
            "end"=>["required","date","after:start"],
        ];
    }

    public function messages(): array
    {
        return [

            "table_id.required"=>trans("user.table id is required"),
            "table_id.exists"=>trans("user.table id is not exists"),
            "name.required"=>trans("user.name is required"),
            "start.required"=>trans("user.the start date is required"),
            "end.required"=>trans("user.the end date is required"),
            "end.after"=>trans("user.the end date should be greater from start date"),
            "start.after_or_equal"=>trans("user.the start date should be after now")
        ];
    }

}
