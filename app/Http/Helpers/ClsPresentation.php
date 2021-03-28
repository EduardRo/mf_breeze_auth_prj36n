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

    // find the presentation not paid not published
    public function presentationNotPaidNotPublished($companyId)
    {
        $presentation = CompanyPresentation::all()
        ->where('company_id',$companyId)
        ->where('company_id', $companyId)
        ->where('activate', false)
        ->where('paid', false)
        ->where('published', false)
        ->first();

        return $presentation;
    }
}
