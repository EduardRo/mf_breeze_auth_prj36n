<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->string('job_name');
            $table->string('job_category')->default('');
            $table->string('job_type')->default('');
            $table->string('job_level')->default('');
            $table->text('job_description')->default('');
            $table->text('job_responsabilities')->default('');
            $table->text('job_skills')->default('');
            $table->text('job_things_nice_to_have')->default('');
            $table->text('job_offer')->default('');
            $table->string('email');
            $table->string('phone');
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
        Schema::dropIfExists('company_jobs');
    }
}
