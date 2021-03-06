<?php

namespace App\Http\Helpers;
use App\Models\CompanyPressRelease;


class ClsPressReleases
{
    public function pressReleasesByCompanyId($companyId)
    {
        $pressReleases = CompanyPressRelease::all()->where('company_id', $companyId);
        return $pressReleases;
    }
    public function pressReleasedNotPaidNotPublished($companyId)
    {
        $pressReleases = CompanyPressRelease::all()
        ->where('company_id', $companyId)
        ->where('activate', false)
        ->where('paid', false)
        ->where('published',false);
        return $pressReleases;
    }

    public function pressReleasedById($Id){
        $pressReleases = CompanyPressRelease::all()->where('id', $Id);
        return $pressReleases;

    }
}
