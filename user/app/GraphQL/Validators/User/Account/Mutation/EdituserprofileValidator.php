<?php

namespace App\GraphQL\Validators\User\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class EdituserprofileValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "name"=>["required"],
            "copon_notification"=>["required"]


        ];
    }


    public function messages(): array
    {

        return [

            "id.required"=>trans("user.id is required"),
            "id.exists"=>trans("user.id is not exists in our data"),
            "name.required"=>trans("user.name is required"),
            "copon_notification.required"=>trans("user.copon notification field is required")

        ];


    }


}
