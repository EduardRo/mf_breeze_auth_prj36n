<?php

namespace App\Http\Controllers;

use App\Models\CompanyPressRelease;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsCompany;
use App\Http\Helpers\ClsPressReleases;
use App\Http\Helpers\ClsSubscription;

class CompanyPressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;

        // class clsPressReleases
        $clsPressReleases = new ClsPressReleases;
        $companyPressReleases = $clsPressReleases->pressReleasesByCompanyId($company_id);
        return view('company.PressReleases', ['companyname' => $company_name, 'companypressreleases' => $companyPressReleases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        //return $company_id;
        return  view('company.createPressReleaseCompany', ['company_id' => $company_id, 'company_name' => $company_name]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the data
        $request->request->add(['enabled' => true]);
        $request->request->add(['activated' => false]);
        $request->request->add(['paid' => false]);
        $request->request->add(['published' => false]);
        $input = $request->all();
        CompanyPressRelease::create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyPressRelease  $companyPressRelease
     * @return \Illuminate\Http\Response
     */
    public function show($Id)
    {
        
        
        $pressReleased = CompanyPressRelease::all()
        ->where('id', $Id);
        return $pressReleased;
        //return $Id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyPressRelease  $companyPressRelease
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyPressRelease $companyPressRelease, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyPressRelease  $companyPressRelease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyPressRelease $companyPressRelease)
    {
        //
    }

    /**
     * Publishing show the Press Released but not published and 
     * the user can make a selection and send for publishing.
     * If is a subscription then it is published
     * If no subscription he must buy an individual product to publish
     * 
     *
     * 
     * 
     */

    public function publishing()
    {
        // show the Press releases created but not send for publishing


        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $companyId = $company->id;
        $clsPressReleases = new ClsPressReleases;
        
        $pressReleasedNotPublished = $clsPressReleases->pressReleasedNotPaidNotPublished($companyId);
        //return $pressReleasedNotPublished;
        return view('company.publishingPressRelease', ['pressReleasedNotPublished' => $pressReleasedNotPublished]);
    }

    public function activation($pressReleaseId)
    {
        // activation - the procedure to verify the subscription or to create a proforma

        //take the id of the company who made the PressRelesed
        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $companyId = $company->id;
        // verification for subscription
        
        $clsSubscription = new ClsSubscription();
        $subscriptionExist = $clsSubscription->verifySubscriptionByCompanyId($companyId);
        if($subscriptionExist){
            $currentSubscription=$subscriptionExist;
            $subscriptionId = $subscriptionExist->id;
            //return $subscriptionId . ' -- ' . $subscriptionExist;
            /* trebuie verificat daca quantity nu este zero - 0
            Daca este zero atunci se trimite catre pagina de achizitie.

            */
            if($subscriptionExist->quantity_now>0){
            $clsSubscription->modifyCurrentSubscription($subscriptionId);
            $clsSubscription->saveCurrentSubscription($currentSubscription);
            
            // Make the press release paid and published true
            $clsPressReleases= new ClsPressReleases;
            $clsPressReleases->modifyPressRelease($pressReleaseId);
            return $subscriptionExist;
            } else {

                return 'este sub zero' . $subscriptionExist;

            }

            
        } else {
            // nu exista abonament si se trimite catre pagina de achizitie
            return 'Nu exista';
        }


        
        
        //return 'Press Release Id: '. $pressReleaseId . 'Company Id: '. $companyId . $subscriptionExist ;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyPressRelease  $companyPressRelease
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyPressRelease $companyPressRelease)
    {
        //
    }
}
