<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_bodies', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('invoice_description');
            $table->string('invoice_unit_type');
            $table->float('invoice_unit_price',2);
            $table->float('invoice_quantity',2);
            $table->float('invoice_amount',2);
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
        Schema::dropIfExists('invoice_bodies');
    }
}