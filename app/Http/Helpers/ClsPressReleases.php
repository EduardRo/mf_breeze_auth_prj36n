<?php

namespace App\Http\Helpers;

use App\Models\CompanyPressRelease;


class ClsPressReleases
{
    public function pressReleasesByCompanyId($companyId)
    {
        $pressReleases = CompanyPressRelease::where('company_id', $companyId)->orderBy('created_at','DESC')->get();
        return $pressReleases;
    }
    public function pressReleasedNotPaidNotPublished($companyId)
    {
        $pressReleases = CompanyPressRelease::all()
            ->where('company_id', $companyId)
            ->where('activate', false)
            ->where('paid', false)
            ->where('published', false);
        return $pressReleases;
    }

    public function pressReleasedById($Id)
    {
        $pressReleases = CompanyPressRelease::all()->where('id', $Id);
        return $pressReleases;
    }

    public function modifyPressRelease($Id)
    {
        $pressRelease = CompanyPressRelease::find($Id);
        $pressRelease->paid = 1;
        $pressRelease->published = 1;
        $pressRelease->save();
    }
}
