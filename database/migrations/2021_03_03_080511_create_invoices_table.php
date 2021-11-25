<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('type_id');
            $table->string('invoice_serie');
            $table->string('invoice_number');
            $table->string('invoice_company_id');
            $table->string('invoice_company_name');
            $table->string('invoice_regcom');
            $table->string('invoice_fiscal_number');
            $table->string('invoice_city');
            $table->text('invoice_address');
            $table->string('invoice_region');
            $table->string('invoice_supplier_name');
            $table->string('invoice_supplier_regcom');
            $table->string('invoice_supplier_fiscal_number');
            $table->integer('invoice_supplier_capital');
            $table->float('invoice_amount', 10, 2);
            $table->float('invoice_amount_vat', 10, 2);
            $table->float('invoice_total_amount', 10, 2);
            $table->string('invoice_supplier_city');
            $table->text('invoice_supplier_address');
            $table->string('invoice_supplier_region');
            $table->boolean('valabil')->default(false);
            $table->boolean('paid')->default(false);
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
        Schema::dropIfExists('invoices');
    }
}
