<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("meta_logo");
            $table->string("logo");
            $table->boolean("status");
            $table->string("phone");
            $table->text("meta_title");
            $table->text("meta_description");
            $table->string("meta_keyword");
            $table->boolean("balance_status");
            $table->integer("balance_charge");
            $table->unsignedBigInteger("currency_id");
            $table->foreign("currency_id")->references("id")->on("currencies");
            $table->string("open_at");
            $table->string("close_at");
            $table->text("day_open");
            $table->boolean("facebook_status");
            $table->string("facebook_link");
            $table->boolean("whatsapp_status");
            $table->string("whatsapp_link");
            $table->boolean("telegram_status");
            $table->string("telegram_link");
            $table->boolean("instagram_status");
            $table->string("instagram_link");
            $table->boolean("twitter_status");
            $table->string("twitter_link");
            $table->boolean("paypal_status");
            $table->string("owner_name");
            $table->unsignedBigInteger("resturant_id");
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("cascade")->onUpdate("cascade");
            // $table->text("paypal_client_id");
            // $table->text("Paypal_secret");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
