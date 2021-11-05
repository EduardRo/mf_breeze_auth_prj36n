<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsInvoice;
use App\Http\Helpers\ClsCompany;
use App\Http\Helpers\ClsSubscription;
use App\Http\Helpers\ClsBusiness;

// pentru inserarea de inregistrari - Facades\DB
use Illuminate\Support\Facades\DB;

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
        // am ales eu 1
        $servicesSerieNr=$clsInvoice->createInvoiceSerie(1);
        
        $invoiceBody=$clsInvoice->createInvoiceBodyByServiceId(1);
        //$clsCompany = new ClsCompany();
        //$company=$clsCompany::all();

        

        //return $clsInvoice->createInvoice();


        return view('company.Invoice', [
            'company' => $company, 
            'business' => $bussiness, 
            'InvoiceBody'=>$invoiceBody, 
            'InvoiceSerie'=>$servicesSerieNr]);
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
    public function show($invoiceId)
    {
        // Arata factura
        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        // Date furnizor;
        $bussiness = Business::all()->where('valabil', 1)->first();

        $clsInvoice = new ClsInvoice();
        // am ales eu 1
        //$servicesSerieNr=$clsInvoice->createInvoiceSerie(1);
        //'invoice_serie', 'invoice_number'
        
        $invoice=$clsInvoice->findSerieNoOfInvoiceById($invoiceId);
        $invoiceBody=$clsInvoice->findInvoiceBodyByInvoiceId($invoiceId);
        $InvoiceSerieNr=[$invoice->invoice_serie , $invoice->invoice_number];
        //$clsCompany = new ClsCompany();
        //$company=$clsCompany::all();

        

        //return $clsInvoice->createInvoice();


        return view('company.Invoice', [
            'company' => $company, 
            'business' => $bussiness, 
            'InvoiceBody'=>$invoiceBody, 
            'InvoiceSerie'=>$InvoiceSerieNr]);
    
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
