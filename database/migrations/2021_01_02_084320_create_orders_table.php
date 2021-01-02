<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('restaurant_id');
            $table->float('total_price', 10, 2);
            $table->string('items');
            $table->boolean('delivered');
            $table->char('address', 255);
            $table->char('zip', 20);
            $table->char('city', 255);
            $table->string('instructions');
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
        Schema::dropIfExists('orders');
    }
}
