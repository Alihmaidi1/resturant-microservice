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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->string("thumbnail");
            $table->text("description");
            $table->string("tag");
            $table->text("meta_title");
            $table->text("meta_description");
            $table->string("meta_logo");
            $table->string("meta_keyword");
            $table->unsignedBigInteger("category_id");
            $table->string("price");
            $table->unsignedBigInteger("currency_id");
            $table->foreign("currency_id")->references("id")->on("currencies");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("resturant_id");
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('food');
    }
};
