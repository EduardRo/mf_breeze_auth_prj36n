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
        // Validation
        $validated = $request->validate([
            'job_name' => 'required',
            'job_type' => 'required',
            'job_level' => 'required',
            'job_description' => 'required',
            
        ]);

            
        
        // Save the data

        $request->request->add(['enabled' => true]);
        $request->request->add(['activated' => false]);
        $request->request->add(['paid' => false]);
        $request->request->add(['published' => false]);
        $input = $request->all();
        CompanyJob::create($input);
        return dd($request);
         //return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        $clsJobs = new ClsJobs;
        $Job = $clsJobs->jobById($id);
        
        //return $companyJobs;
        return view('company.Job', ['companyname' => $company_name, 'job' => $Job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function edit($Id)
    {
        
        //CompanyJob $companyJob
        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        $clsJobs = new ClsJobs;
        $job = $clsJobs->jobById($Id);
        
        //return $Job;
        return view('company.editJob', ['company' => $company, 'job' => $job]);
        //return  $Job;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyJob  $companyJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    
    {
        $job = CompanyJob::Find($request->id);
        $job->job_name = $request->job_name;
        
        $job->job_type = $request->job_type;
        $job->job_level = $request->job_level;
        $job->job_description = $request->job_description;
        $job->job_responsabilities = $request->job_responsabilities;
        $job->job_skills = $request->job_skills;
        $job->job_things_nice_to_have = $request->job_things_nice_to_have;
        $job->email = $request->email;
        $job->phone = $request->phone;
        $job->enabled = 1;
        $job->activated = 0;
        $job->paid = 0;
        $job->published = 0;

        $job->save();
        $message = 'Modificarile au fost salvate!';
        /*
        $company = CompanyPresentation::Find($request->id);
        $company->company_name = $request->company_name;
        $company->company_description = $request->company_description;
        $company->company_services = $request->company_services;
        $company->company_management_team = $request->company_management_team;
        $company->company_address = $request->company_address;
        $company->company_contact = $request->company_contact;
        $company->enabled = 1;
        $company->activated = 0;
        $company->paid = 0;
        $company->published = 0;

        $company->save();
        
        $message = 'Modificarile au fost salvate!';
        // return $message;
        */
        //return view('company.Job', ['presentation' => $company, 'message' => $message]);

        $customCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $customCompany->retrieveCompanyId($userId);
        $company_id = $company->id;
        $company_name = $company->company_name;
        
        $clsJobs = new ClsJobs;
        $job = $clsJobs->jobById($request->id);
        return view('company.Job', ['companyname' => $company_name, 'job' => $job]);
    
        
        //dd($request);
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

    public function publishing()
    {
        // show the Jobs created but not send for publishing


        $clsCompany = new ClsCompany();
        $userId = auth()->id();

        $company = $clsCompany->retrieveCompanyId($userId);
        $companyId = $company->id;
        $companyName=$company->company_name;
        $clsJobs = new ClsJobs;
        
        $jobsNotPaidNotPublished = $clsJobs->jobsNotPaidNotPublished($companyId);
        //return $pressReleasedNotPublished;
        //return $jobsNotPaidNotPublished;
        return view('company.publishingJobs', ['companyname'=>$companyName,
        'jobsNotPaidNotPublished' => $jobsNotPaidNotPublished]);
    }

    public function activation($jobId)
    {
        dd($jobId);
        //Trebuie modificat pentru job (exempl8l este pentru press releases)
        // activation - the procedure to verify the subscription or to create a proforma

        //take the id of the company who made the PressRelesed
        
    

       
        
        
        //return 'Press Release Id: '. $pressReleaseId . 'Company Id: '. $companyId . $subscriptionExist ;
    }
}
