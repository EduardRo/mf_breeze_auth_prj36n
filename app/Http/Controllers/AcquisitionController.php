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
        $subscription = $clsSubscription->subscriptionDataByName($code);
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



        return view('company.Acquisition', ['typeAcquisition' => $typeAcquisition, 'categoryAcquisition' => $categoryAcquisition, 'code' => $code, 'subscription' => $subscription]);
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
        $subscription = $clsSubscription->subscriptionDataByName($request->subscriptionName);
        //return $subscription;
        // se creaza factura serie si numar Proforma
        $clsInvoice = new ClsInvoice();
        $invoiceSerieNumber = $clsInvoice->createInvoiceSerieNumberDate($subscription->subscription_name, $subscription->subscription_category, $company->id);

        //return "Seria: " .$invoiceSerieNumber[0] . "-" . $invoiceSerieNumber[1] . "-" . $invoiceSerieNumber[2];
        // creaza seria
        //return $this->saveInvoice($company, $invoiceSerieNumber);
        // Create the invoice
        $invoice_amount = $subscription->subscription_price_ron;
        $invoice_amount_vat = $invoice_amount * 0.19;
        $invoice_total_amount = $invoice_amount + $invoice_amount_vat;
        $invoice = [
            $invoiceSerieNumber[0],
            $invoiceSerieNumber[1],
            $company->company_name,
            $company->company_regcom,
            $company->company_fiscalcode,
            $company->company_city,
            $company->company_address,
            "Bucuresti",
            $business->business_company_name,
            $business->business_regcom,
            $business->business_fiscal_number,
            $business->business_capital,
            $invoice_amount,
            $invoice_amount_vat,
            $invoice_total_amount,
            $business->business_city,
            $business->business_address,
            $business->business_region

        ];
        return $this->saveInvoice($invoice);
        //return $business;
        //return print_r($invoice);



        // Create the invoice proforma body

        // Save the company_subscription



        /*        
        // Se salveaza abonamentul in company_subscriptions
        $request->request->add(['company_id' => 22]);
        $request->request->add(['subscription_id' => 33]);
        $request->request->add(['subscription_name' => $subscription->subscription_name]);
        $request->request->add(['subscription_category' => $subscription->subscription_category]);
        $request->request->add(['subscription_type' => $subscription->type]);
        $request->request->add(['quantity_now' => 1]);
        $request->request->add(['quantity_before' => 0]);
        $request->request->add(['used_for' => 'achizitie']);
        $request->request->add(['subscription_invoice' => '222-RTL']);
        $request->request->add(['subscription_price_eur' => $subscription->subscription_price_eur]);
        $request->request->add(['subscription_price_ron' => $subscription->subscription_price_ron]);
        $request->request->add(['subscription_activated' => false]);
        $request->request->add(['subscription_paid' => false]);
        $request->request->add(['subscription_valid' => false]);
        
        $input = $request->all();
        CompanySubscription::create($input);
        //return redirect()->back();

        // Se creaza factura proforma
       // return $request->subscriptionName;
    */
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
        if (Invoice::where('invoice_number', $invoice[1]-1)->exists()) {
            return 'factura exista';
        }


        $id = DB::table('invoices')->insertGetId(
            [
            
            'invoice_serie'=>$invoice[0],
            'invoice_number'=>$invoice[1],
            'invoice_company_name'=>$invoice[2],
            'invoice_regcom'=>$invoice[3],
            'invoice_fiscal_number'=>$invoice[4],
            'invoice_city'=>$invoice[5],
            'invoice_address'=>$invoice[6],
            'invoice_region'=>$invoice[7],
            'invoice_supplier_name'=>$invoice[8],
            'invoice_supplier_regcom'=>$invoice[9],
            'invoice_supplier_fiscal_number'=>$invoice[10],
            'invoice_supplier_capital'=>100,
            'invoice_amount'=>$invoice[12],
            'invoice_amount_vat'=>$invoice[13],
            'invoice_total_amount'=>$invoice[14],

            'invoice_supplier_city'=>$invoice[15],
            'invoice_supplier_address'=>$invoice[16],
            'invoice_supplier_region'=>$invoice[17]

            
            ]
        );

        echo $id;
    }
}
