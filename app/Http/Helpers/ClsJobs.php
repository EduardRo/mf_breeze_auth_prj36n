<?php

namespace App\Http\Helpers;
use App\Models\CompanyJob;


class ClsJobs
{
    public function jobsByCompanyId($companyId)
    {
        $alljobs = CompanyJob::all()->where('company_id', $companyId);
        return $alljobs;
    }

    public function jobById($id){
        $thejob = CompanyJob::all()->where('id',$id)->first();
        return $thejob;

    }

    public function jobsNotPaidNotPublished($companyId)
    {
        // nu stiu enabled ce face
        $jobs = CompanyJob::all()
            ->where('company_id', $companyId)
            ->where('enabled', true)
            ->where('activate', false)
            ->where('paid', false)
            ->where('published', false);
        return $jobs;
    }

    public function jobVerifyOwner($jobId, $companyId)
    {
        // functia verifica daca anuntul de job corespunde companiei userului
        $jobsOwner = CompanyJob::all()
        ->where('company_id', $companyId)
        ->where('id', $jobId)->first();

        return $jobsOwner;
    }
       
}
