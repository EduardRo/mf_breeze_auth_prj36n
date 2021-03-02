<?php

namespace App\Http\Controllers;

use App\Models\CompanyJob;
use Illuminate\Http\Request;
use App\Http\Helpers\ClsCompany;
use App\Http\Helpers\ClsJobs;


class CompanyJobController extends Controller
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

        // class clsJobs
        $clsJobs = new ClsJobs;
        $companyJobs = $clsJobs->jobsByCompanyId($company_id);
        //return $companyJobs;
        return view('company.Jobs', ['companyname' => $company_name, 'companyjobs' => $companyJobs]);
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


        // return  $company_name;
        return view('company.createCompanyJob', ['company_id' => $company_id, 'company_name' => $company_name]);
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
        CompanyJob::create($input);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyJob $companyJob)
    {
        //
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        $clsJobs = new ClsJobs;
        $Job = $clsJobs->jobById($id);
        //return $companyJobs;
        return view('company.Job', ['companyname' => $company_name, 'job' => $Job]);
        //return  $Job;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyJob $companyJob)
    {
        //
        $variab='ddd';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyJob $companyJob)
    {
        //
    }
}
