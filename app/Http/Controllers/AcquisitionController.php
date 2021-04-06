<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySubscription;
use App\Http\Helpers\ClsSubscription;
use App\Http\Helpers\ClsInvoice;

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
        if($subscription=='') {
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
        $typeAcquisition='SBS';
        $categoryAcquisition='P';
        


        return view('company.Acquisition', ['typeAcquisition'=>$typeAcquisition, 'categoryAcquisition'=>$categoryAcquisition, 'code'=>$code, 'subscription'=>$subscription]);
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
        //create invoice
        $clsInvoice = new ClsInvoice();
        $company = $clsInvoice->createInvoice();
        return $company;

/*
        //return $request->subscriptionName;
        $clsSubscription= new ClsSubscription();
        $subscription = $clsSubscription->subscriptionDataByName($request->subscriptionName);
        //return $subscription;
        // se creaza factura Proforma
        
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
}
