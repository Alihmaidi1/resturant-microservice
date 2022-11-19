<?php

namespace App\GraphQL\Validators\User\Account\Mutation;

use Nuwave\Lighthouse\Validation\Validator;
use App\Rules\ExistInResturant;
final class CreateuserValidator extends Validator
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
            "email"=>["required","email"],
            "password"=>["required"],
            "resturant_id"=>["required",new ExistInResturant],


        ];
    }


    public function messages(): array
    {

        return [
            "name.required"=>trans("user.name is required"),
            "email.required"=>trans("user.email is required"),
            "email.email"=>trans("user.email field should be email"),
            "password.required"=>trans("user.password is required"),
            "resturant_id.required"=>trans("user.resturant id is required"),
        ];


    }



}
