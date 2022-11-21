<?php

namespace App\GraphQL\Validators\Admin\Chat\query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetallmessageValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [

            "chat_id"=>["required","exists:chats,id"]

        ];
    }

    public function messages(): array
    {

        return [

            "chat_id.exits"=>trans("admin.chat id is not exists in our data"),
            "chat_id.required"=>trans("admin.chat id is required")
        ];
    }
}
