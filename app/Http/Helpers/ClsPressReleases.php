<?php

namespace App\Http\Helpers;
use App\Models\CompanyPressRelease;


class ClsPressReleases
{
    public function pressReleases($companyId)
    {
        $pressReleases = CompanyPressRelease::all()->where('company_id', $companyId);
        return $pressReleases;
    }
}
