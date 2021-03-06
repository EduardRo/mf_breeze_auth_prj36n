<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('subscription_code');
            $table->string('subscription_category');
            $table->integer('quantity_now');
            $table->integer('quantity_before')->default(0);
            $table->string('used_for')->default('');
            $table->integer('service_id')->default(0);
            $table->string('subscription_invoice')->default('');
            $table->string('subscription_price')->default('');
            $table->boolean('valid');
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
        Schema::dropIfExists('company_subscriptions');
    }
}
