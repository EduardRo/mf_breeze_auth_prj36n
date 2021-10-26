<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('service_category');
            $table->string('service_code');
            $table->text('service_description');
            $table->string('service_unit_type');
            $table->integer('service_quantity');
            $table->float('service_unit_price_eur', 10, 2);
            $table->float('service_unit_price', 10, 2);
            $table->float('service_discount_percent', 10, 2);
            $table->float('service_discount_amount', 10, 2);
            $table->text('service_price_description');
            $table->boolean('enabled');
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
        Schema::dropIfExists('services');
    }
}
