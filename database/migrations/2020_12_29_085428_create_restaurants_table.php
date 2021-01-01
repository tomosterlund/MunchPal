<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->char('tag_one', 20);
            $table->char('tag_two', 20)->nullable();
            $table->char('address', 255);
            $table->char('zip', 20);
            $table->char('city', 255);
            $table->char('email', 255)->unique();
            $table->string('password');
            $table->char('imageUrl', 255)->nullable();

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
        Schema::dropIfExists('restaurants');
    }
}
