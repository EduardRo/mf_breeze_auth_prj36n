<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPressReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_press_releases', function (Blueprint $table) {
            /*
            Stages
            Activation - the Press Release was send for publication (the proforma was created) 
            Paid - It was paid - the user insert the data for payments
            Published - the admin give ok for publication

            The admin see a list of activation and a separate list of paid and must verify the payments



            */
            $table->id();
            $table->integer('company_id');
            $table->string('title');
            $table->text('text');
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
        Schema::dropIfExists('company_press_releases');
    }
}
