<?php

namespace App\GraphQL\Validators\Admin\Tabletype\Query;

use Nuwave\Lighthouse\Validation\Validator;

final class GetalltabletypeValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            "resturant_id"=>["required","exists:resturants,id"]

        ];
    }

    public function messages(): array
    {
        return [

            "resturant_id.required"=>trans("admin.id is required"),
            "resturant_id.exists"=>trans("admin.id is not exists in our data")

        ];
    }

}
