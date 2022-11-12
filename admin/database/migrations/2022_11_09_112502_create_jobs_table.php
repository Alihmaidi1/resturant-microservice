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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->string("salary");
            $table->unsignedBigInteger("resturant_id");
            $table->foreign("resturant_id")->references("id")->on("resturants")->onDelete("cascade")->onUpdate("cascade");
            $table->unsignedBigInteger("currency_id");
            $table->foreign("currency_id")->references("id")->on("currencies")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('jobs');
    }
};
