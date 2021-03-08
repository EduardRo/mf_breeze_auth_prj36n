<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsInvoice;
use App\Http\Helpers\ClsCompany;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /* Call 4 methods from the ClsInvoice that give back
        objects to be used in the invoice template
        the Customer Data
        the Supplier data
        the Invoice Number
        The Body of the invoice



        */
        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        // Date furnizor;
        $bussiness = Business::all()->where('valabil', 1)->first();

        $clsInvoice = new ClsInvoice();
        $ServiceId=2;
        $invoiceBody=$clsInvoice->createInvoiceBodyByServiceId($ServiceId);
        //$clsCompany = new ClsCompany();
        //$company=$clsCompany::all();

        

        //return $clsInvoice->createInvoice();


        return view('company.Invoice', ['company' => $company, 'business' => $bussiness, 'InvoiceBody'=>$invoiceBody]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
