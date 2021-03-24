<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_presentations', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('company_name');
            $table->text('company_description');
            $table->text('company_services');
            $table->text('company_management_team');
            $table->text('company_address');
            $table->text('company_contact');
            $table->boolean('enabled')->default(1);
            $table->boolean('activated')->nullable();
            $table->boolean('paid')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('deleted')->nullable();


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
        Schema::dropIfExists('company_presentations');
    }
}
