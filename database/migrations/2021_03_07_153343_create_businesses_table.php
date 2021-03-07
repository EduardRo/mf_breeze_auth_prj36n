<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('business_company_name');
            $table->string('business_regcom');
            $table->string('business_fiscal_number');
            $table->string('business_city');
            $table->text('business_address');
            $table->string('business_region');
            $table->integer('business_capital');
            $table->string('business_bank')->default('');
            $table->string('business_iban')->default('');
            $table->boolean('valabil')->default(0);
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
        Schema::dropIfExists('businesses');
    }
}
