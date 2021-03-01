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
}
