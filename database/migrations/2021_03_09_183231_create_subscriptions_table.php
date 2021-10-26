<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_name');
            $table->text('subscription_description');
            $table->string('subscription_category');
            $table->string('subscription_category_name');
            $table->string('subscription_category_description');
            $table->string('type');
            $table->string('subscription_quantity');
            $table->float('rate_eur_ron',5,4);
            $table->float('subscription_price_eur', 5, 2);
            $table->float('subscription_price_ron', 5, 2);
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
        Schema::dropIfExists('subscriptions');
    }
}
