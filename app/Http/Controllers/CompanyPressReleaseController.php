<?php

namespace App\Http\Controllers;

use App\Models\CompanyPressRelease;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsCompany;
use App\Http\Helpers\ClsPressReleases;

class CompanyPressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;

        // class clsPressReleases
        $clsPressReleases = new ClsPressReleases;
        $companyPressReleases = $clsPressReleases->pressReleases($company_id);
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
        $request->request->add(['enabled' => false]);
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
    public function show(CompanyPressRelease $companyPressRelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyPressRelease  $companyPressRelease
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyPressRelease $companyPressRelease)
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