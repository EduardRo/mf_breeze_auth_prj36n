<?php

namespace App\Http\Helpers;

use function PHPUnit\Framework\empty;
use App\Models\CompanySubscription;

class ClsSubscription
{

    public function verifySubscriptionByCompanyId($companyId)
    {
        $subscriptionExist = CompanySubscription::all()->where('company_id', $companyId)->where('valid', true);
        if (empty($subscriptionExist[0])) {
            return $companyId . 'false';
        } else {
            return $companyId . 'true' . $subscriptionExist;
        }
    }
}
