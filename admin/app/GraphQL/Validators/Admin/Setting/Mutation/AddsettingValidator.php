<?php

namespace App\GraphQL\Validators\Admin\Setting\Mutation;

use Nuwave\Lighthouse\Validation\Validator;

final class AddsettingValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {

        return [

            "currency_id"=>["required","exists:currencies,id"],
            "resturant_id"=>["required","exists:resturants,id"],
            "status"=>["required"],
            "phone"=>["required"],
            "meta_title_en"=>["required"],
            "meta_title_ar"=>["required"],
            "meta_description_en"=>["required"],
            "meta_description_ar"=>["required"],
            "meta_keyword"=>["required"],
            "meta_logo"=>["required","mimes:jpg,jpeg,png"],
            "balance_status"=>["required"],
            "balance_charge"=>["required"],
            "open_at"=>["required"],
            "close_at"=>["required"],
            "day_open_en"=>["required"],
            "day_open_ar"=>["required"],
            "facebook_status"=>["required"],
            "facebook_link"=>["required"],
            "whatsapp_status"=>["required"],
            "whatsapp_link"=>["required"],
            "telegram_status"=>["required"],
            "telegram_link"=>["required"],
            "instagram_status"=>["required"],
            "instagram_link"=>["required"],
            "twitter_status"=>["required"],
            "twitter_link"=>["required"],
            "paypal_status"=>["required"],
            "owner_name"=>["required"],
            "logo"=>["required","mimes:jpg,jpeg,png"],

        ];
    }

    public function messages(): array
    {
        return [

            "currency_id.exists"=>trans("admin.currency id is not exists in our data"),
            "currency_id.required"=>trans("admin.currency id is required"),
            "resturant_id.required"=>trans("admin.resturant id is required"),
            "resturant_id.exists"=>trans("admin.resturant id is not exists in our data"),
            "logo.mimes"=>trans("admin.logo should be image"),
            "logo.required"=>trans("admin.logo is required"),
            "meta_logo.required"=>trans("admin.meta logo is required"),
            "meta_logo.mimes"=>trans("admin.meta logo should be image"),
            "status.required"=>trans("admin.status is required"),
            "phone.required"=>trans("admin.phone is required"),
            "meta_title_en.required"=>trans("admin.meta title in english is required"),
            "meta_title_ar.required"=>trans("admin.meta title in arabic is required"),
            "meta_description_en.required"=>trans("admin.meta description in english is required"),
            "meta_description_en.required"=>trans("admin.meta description in arabic is required"),
            "meta_keyword.required"=>trans("admin.meta keyword is required"),
            "balance_status.required"=>trans("admin.balance status is required"),
            "balance_charge.required"=>trans("admin.balance charge is required"),
            "c.required"=>trans("admin.open at is required"),
            "close_at.required"=>trans("admin.close at is required"),
            "day_open_en.required"=>trans("admin.day open in english is required"),
            "day_open_ar.required"=>trans("admin.day open in arabic is required"),
            "facebook_status.required"=>trans("admin.facebook status is required"),
            "facebook_link.required"=>trans("admin.facebook link is required"),
            "whatsapp_status.required"=>trans("admin.whatsapp status is required"),
            "whatsapp_link.required"=>trans("admin.whatsapp link is required"),
            "telegram_status.required"=>trans("admin.telegram status is required"),
            "telegram_link.required"=>trans("admin.telegram link is required"),

            "instagram_status.required"=>trans("admin.instagram status is required"),
            "instagram_link.required"=>trans("admin.instagram link is required"),

            "twitter_status.required"=>trans("admin.twitter status is required"),
            "twitter_link.required"=>trans("admin.twitter link is required"),
            "paypal_status.required"=>trans("admin.paypal status is required"),
            "owner_name.required"=>trans("admin.owner name is required")


        ];
    }


}
