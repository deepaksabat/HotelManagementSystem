<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customers_id')->unsigned();
            $table->integer('rooms_id')->unsigned();
            $table->timestamp('checkin_time')->default(\Carbon\Carbon::now());
            $table->timestamp('checkout_time')->default(\Carbon\Carbon::now()->addDays(2));
            $table->double('total_bill');
            $table->double('paid_bill');
            $table->integer('num_people');
            $table->enum('room_status', ['reserved', 'booked']);
            $table->integer('active');
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
        Schema::dropIfExists('bookings');
    }
}
