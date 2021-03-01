<?php

namespace App\Http\Helpers;
use App\Models\CompanyPresentation;


class ClsPresentation
{
    public function presentationByCompanyId($companyId)
    {
        $presentation = CompanyPresentation::all()->where('company_id', $companyId)->first();
        return $presentation;
    }

    public function presentationById($id){
        $thejob = CompanyPresentation::all()->where('id',$id)->first();
        return $thejob;

    }
}
