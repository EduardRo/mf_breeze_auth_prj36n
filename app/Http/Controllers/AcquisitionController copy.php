<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySubscription;
use App\Models\Invoice;
use App\Http\Helpers\ClsSubscription;
use App\Http\Helpers\ClsInvoice;
use App\Http\Helpers\ClsBusiness;
use App\Http\Helpers\ClsCompany;
// pentru inserarea de inregistrari - Facades\DB
use Illuminate\Support\Facades\DB;

class AcquisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code)
    {
        $clsSubscription = new ClsSubscription;
        $subscription = $clsSubscription->subscriptionDataByCode($code);
        if ($subscription == '') {
            return 'Acest abonament nu exista! Eroare!';
        }

        /*
        typeAcquisition
        -subscription
        -service
        categoryAcquisition
        -presentation
        -pressrelease
        -job
        */
        $typeAcquisition = 'SBS';
        $categoryAcquisition = 'P';

        //dd($subscription);
        
        return view('company.Acquisition', [
            'typeAcquisition' => $typeAcquisition, 
            'categoryAcquisition' => $categoryAcquisition, 
            'code' => $code, 
            'subscription' => $subscription]);
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
        //current user
        $userId = auth()->id();
        //bring company data
        $clsCompany = new ClsCompany();
        $company = $clsCompany->retrieveDataCompanyById($userId);
        //return $company;
        //bring business data
        $clsBusiness = new ClsBusiness();
        $business = $clsBusiness->businessData();
        //return $business;
        // se preia abonamentul
        // bring subscription data
        $clsSubscription = new ClsSubscription();
        $subscription = $clsSubscription->subscriptionDataByCode($request->subscriptionCode);
        //return $subscription;
        //------------ Trebuie salvat abonamentul in companySubscription ----
        // se creaza factura serie si numar Proforma
        $clsInvoice = new ClsInvoice();
        $invoiceSerieNumber = $clsInvoice->createInvoiceSerieNumberDate($subscription->subscription_code, $subscription->subscription_category, $company->id);
        return $invoiceSerieNumber;
        //return "Seria: " .$invoiceSerieNumber[0] . "-" . $invoiceSerieNumber[1] . "-" . $invoiceSerieNumber[2];
        // creaza seria
        //return $this->saveInvoice($company, $invoiceSerieNumber);
        // Create the invoice
        $invoice_amount = $subscription->price_ron;
        $invoice_amount_vat = $invoice_amount * 0.19;
        $invoice_total_amount = $invoice_amount + $invoice_amount_vat;
        $invoice = [
            
            'invoiceSerie'=>$invoiceSerieNumber[0],
            'invoiceSerieNumber'=>$invoiceSerieNumber[1],
            'invoiceCompanyId'=>$company->company_id,
            'invoiceCompanyName'=>$company->company_name,
            'invoiceCompanyRegCom'=>$company->company_regcom,
            'invoiceFiscalCode'=>$company->company_fiscalcode,
            'invoiceCompanyCity'=>$company->company_city,
            'invoiceCompanyAddress'=>$company->company_address,
            
            'invoiceBusinessName'=>$business->business_company_name,
            'invoiceBusinessRegCom'=>$business->business_regcom,
            'invoiceBusinessFiscalNumber'=>$business->business_fiscal_number,
            'invoiceBusinessCapital'=>$business->business_capital,
            'invoiceBusinessCity'=>$business->business_city,
            'invoiceBusinessAddress'=>$business->business_address,
            'invoiceBusinessRegion'=>$business->business_region,
            'invoiceAmount'=>$invoice_amount,
            'invoiceAmountVat'=>$invoice_amount_vat,
            'invoiceTotalAmount'=>$invoice_total_amount,
            
            'invoiceSubscription'=>$subscription->id


        ];
        $invoiceId = $this->saveInvoice($invoice);
        // return $invoiceId;
        // Save invoicebody
        
        $invoice_vat = $invoice_amount * 0.19;
        $invoice_amount_with_vat = $invoice_amount + $invoice_vat;
        $invoiceBody = [
            'invoice_id' => $invoiceId,
            'invoice_description' => $subscription->subscription_description,
            'invoice_unit_type' => $subscription->type,
            'invoice_unit_price' => 'Buc',
            'invoice_quantity' => 1,
            'invoice_amount' => $invoice_amount,
            'invoice_vat' => $invoice_vat,
            'invoice_amount_with_vat' => $invoice_amount_with_vat,

        ];

        $invoiceIdBody = $this->saveInvoiceBody($invoiceBody);
        $invoiceSerieNumber=$clsInvoice->findSerieNoOfInvoiceById($invoiceId);
        $invoice_Serie_Number = $invoiceSerieNumber->invoice_serie . '-'.$invoiceSerieNumber->invoice_number;
        // Create the invoice proforma body
        // Save the company_subscription
         
        // Se salveaza abonamentul in company_subscriptions
        // trebuie sa mut tot intr-o functie si trebuie sa aduc si variabila companie
        $request->request->add(['company_id' => $company->id]);
        $request->request->add(['subscription_id' => 33]);
        $request->request->add(['invoice_id'=>$invoiceId]);
        $request->request->add(['subscription_name' => $subscription->subscription_name]);
        $request->request->add(['subscription_description' => $subscription->subscription_description]);
        $request->request->add(['subscription_category' => $subscription->subscription_category]);
        $request->request->add(['subscription_category_name' => $subscription->subscription_category_name]);
        $request->request->add(['subscription_category_description' => $subscription->subscription_category_description]);
        $request->request->add(['type' => $subscription->type]);
        //$request->request->add(['quantity_now' => 1]);
        //$request->request->add(['quantity_before' => 0]);
        //$request->request->add(['used_for' => 'achizitie']);
        //$request->request->add(['subscription_invoice_id' => $invoiceId]);
        //$request->request->add(['subscription_invoice_serie_number' => $invoice_Serie_Number]);
        $request->request->add(['price_eur' => $subscription->price_eur]);
        $request->request->add(['price_ron' => $subscription->price_ron]);
       
        //$request->request->add(['subscription_paid' => false]);
        //$request->request->add(['subscription_activated' => true]);
        //$request->request->add(['subscription_enabled' => true]);
        $request->request->add(['period' => $subscription->period]);
        $request->request->add(['paid' => false]);
        $request->request->add(['activated' => true]);
        $request->request->add(['enabled' => true]);
        //$request->request->add(['published' => false]);
        
        $input = $request->all();
        CompanySubscription::create($input);
        //return redirect()->back();

        // Se creaza factura proforma

       // return $request->subscriptionName;
       return redirect('/invoice/'.$invoiceId);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveInvoice($invoice)
    {
        // verificarea asta trebuie regandita deoarece functia creaza mereu un nou numar de factura
        if (Invoice::where('invoice_number', $invoice[1] - 1)->exists()) {
            return 'factura exista';
        }
        // creaza inregistrarea in tabela invoices si preia id-ul inregistrarii

        $id = DB::table('invoices')->insertGetId(
            [
                'type'=>'Subscription',
                'type_id'=>$invoice[18],
                'invoice_serie' => $invoice[0],
                'invoice_number' => $invoice[1],
                'invoice_company_id' => $invoice[2],
                'invoice_company_name' => $invoice[3],
                'invoice_regcom' => $invoice[4],
                'invoice_fiscal_number' => $invoice[5],
                'invoice_city' => $invoice[6],
                'invoice_address' => $invoice[7],
                'invoice_region' => $invoice[8],
                'invoice_supplier_name' => $invoice[9],
                'invoice_supplier_regcom' => $invoice[10],
                'invoice_supplier_fiscal_number' => $invoice[11],
                'invoice_supplier_capital' => 100,
                'invoice_amount' => $invoice[13],
                'invoice_amount_vat' => $invoice[14],
                'invoice_total_amount' => $invoice[15],

                'invoice_supplier_city' => $invoice[16],
                'invoice_supplier_address' => $invoice[17],
                'invoice_supplier_region' => $invoice[18]


            ]
        );

        return $id;
    }
    public function saveInvoiceBody($invoiceBody)
    {
        

        
        $id = DB::table('invoice_bodies')->insertGetId(
            [

                'invoice_id' => $invoiceBody['invoice_id'],
                'invoice_description' => $invoiceBody['invoice_description'],
                'invoice_unit_type' => $invoiceBody['invoice_unit_type'],
                'invoice_unit_price' => $invoiceBody['invoice_unit_price'],
                'invoice_quantity' => $invoiceBody['invoice_quantity'],
                'invoice_amount' => $invoiceBody['invoice_amount'],
                'invoice_vat' => $invoiceBody['invoice_vat'],
                'invoice_amount_with_vat' => $invoiceBody['invoice_amount_with_vat']
            
            
            ]
        );
        
        
    }

    public function saveCompanySubscription($company_id, $invoice_id, $subscription)
    {
        
    }
}
