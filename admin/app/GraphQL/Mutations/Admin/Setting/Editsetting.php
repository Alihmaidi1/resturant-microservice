<?php

namespace App\GraphQL\Mutations\Admin\Setting;

use App\Models\setting;
use Illuminate\Support\Facades\Storage;

final class Editsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $setting=setting::find($args["id"]);
        if($args["meta_logo"]!=null){
            Storage::disk("resturant_".$setting->resturant_id)->delete($setting->getRawOriginal("meta_logo"));
            $meta_logo_name=saveimage("resturant_".$args["resturant_id"],$args["meta_logo"],"setting");
            $setting->meta_logo=$meta_logo_name;

        }



        if($args["logo"]!=null){
            Storage::disk("resturant_".$setting->resturant_id)->delete($setting->getRawOriginal("logo"));
            $logo_name=saveimage("resturant_".$args["resturant_id"],$args["logo"],"setting");
            $setting->meta_logo=$logo_name;

        }
        $setting->status=$args["status"];
        $setting->phone=$args["phone"];
        $setting->meta_title=["en"=>$args["meta_title_en"],"ar"=>$args["meta_title_ar"]];
        $setting->meta_description=["en"=>$args["meta_description_en"],"ar"=>$args["meta_description_ar"]];
        $setting->meta_keyword=$args["meta_keyword"];
        $setting->balance_status=$args["balance_status"];
        $setting->balance_charge=$args["balance_charge"];
        $setting->currency_id=$args["currency_id"];
        $setting->open_at=$args["open_at"];
        $setting->close_at=$args["close_at"];
        $setting->day_open=["en"=>$args["day_open_en"],"ar"=>$args["day_open_ar"]];
        $setting->facebook_status=$args["facebook_status"];
        $setting->facebook_link=$args["facebook_link"];
        $setting->whatsapp_status=$args["whatsapp_status"];
        $setting->whatsapp_link=$args["whatsapp_link"];
        $setting->telegram_status=$args["telegram_status"];
        $setting->telegram_link=$args["telegram_link"];
        $setting->instagram_status=$args["instagram_status"];
        $setting->instagram_link=$args["instagram_link"];
        $setting->twitter_status=$args["twitter_status"];
        $setting->twitter_link=$args["twitter_link"];
        $setting->paypal_status=$args["paypal_status"];
        $setting->owner_name=$args["owner_name"];
        $setting->resturant_id=$args["resturant_id"];
        $setting->save();
        return $setting;

    }
}
