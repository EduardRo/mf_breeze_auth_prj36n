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
            $table->float('price_eur',7,2);
            $table->float('price_ron',7,2);
            $table->boolean('enabled');
            $table->integer('period');
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
