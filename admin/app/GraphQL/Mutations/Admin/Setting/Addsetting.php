<?php

namespace App\GraphQL\Mutations\Admin\Setting;

use App\Models\setting;
use Illuminate\Support\Facades\Storage;

final class Addsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $logo=saveimage("resturant_".$args["resturant_id"],$args["logo"],"setting");
        $meta_logo=saveimage("resturant_".$args["resturant_id"],$args["meta_logo"],"setting");

        $setting=setting::create([

            "meta_logo"=>$meta_logo,
            "logo"=>$logo,
            "status"=>$args["status"],
            "phone"=>$args["phone"],
            "meta_title"=>["ar"=>$args["meta_title_ar"],"en"=>$args["meta_title_en"]],
            "meta_description"=>["ar"=>$args["meta_description_ar"],"en"=>$args["meta_description_en"]],
            "meta_keyword"=>$args["meta_keyword"],
            "balance_status"=>$args["balance_status"],
            "balance_charge"=>$args["balance_charge"],
            "currency_id"=>$args["currency_id"],
            "open_at"=>$args["open_at"],
            "close_at"=>$args["close_at"],
            "day_open"=>["ar"=>$args["day_open_ar"],"en"=>$args["day_open_en"]],
            "facebook_status"=>$args["facebook_status"],
            "facebook_link"=>$args["facebook_link"],
            "whatsapp_status"=>$args["whatsapp_status"],
            "whatsapp_link"=>$args["whatsapp_link"],
            "telegram_status"=>$args["telegram_status"],
            "telegram_link"=>$args["telegram_link"],
            "instagram_status"=>$args["instagram_status"],
            "instagram_link"=>$args["instagram_link"],
            "twitter_status"=>$args["twitter_status"],
            "twitter_link"=>$args["twitter_link"],
            "paypal_status"=>$args["paypal_status"],
            "owner_name"=>$args["owner_name"],
            "resturant_id"=>$args["resturant_id"],
            "paypal_client_id"=>$args["paypal_client_id"],
            "paypal_secret"=>$args["paypal_secret"]
        ]);
        $setting->message=trans("admin.the setting was added to this resturant successfully");
        return $setting;


    }
}
