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

        $logo=time().rand(0,9999999).".".$args["logo"]->getClientOriginalExtension();
        Storage::disk("public")->putFileAs("setting",$args["logo"],$logo);
        $meta_logo=time().rand(0,9999999).".".$args["meta_logo"]->getClientOriginalExtension();
        Storage::disk("public")->putFileAs("setting",$args["meta_logo"],$meta_logo);

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
            "resturant_id"=>$args["resturant_id"]

        ]);
        $setting->message="dssd";
        return $setting;


    }
}
