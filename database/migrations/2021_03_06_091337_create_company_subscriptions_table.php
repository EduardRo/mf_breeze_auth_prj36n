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
            $table->string('subscription_id');
            $table->string('subscription_name');
            $table->string('subscription_category');
            $table->string('subscription_type')->default('');
            $table->integer('quantity_now')->default(0);
            $table->integer('quantity_before')->default(0);
            $table->string('used_for')->default('');
            $table->string('subscription_invoice_id')->default('');
            $table->string('subscription_invoice_serie_number')->default('');
            $table->float('subscription_price_eur')->default(0.00);
            $table->float('subscription_price_ron')->default(0.00);
            $table->boolean('enabled');
            $table->boolean('activated');
            $table->boolean('paid');
            $table->boolean('published');
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
