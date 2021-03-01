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
            $table->string('job_type');
            $table->string('job_level');
            $table->text('job_description');
            $table->text('job_responsabilities');
            $table->text('job_skills');
            $table->text('job_things_nice_to_have');
            $table->text('job_offer');
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
