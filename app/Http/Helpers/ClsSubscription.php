<?php

namespace App\Http\Helpers;

use function PHPUnit\Framework\empty;
use App\Models\CompanySubscription;

class ClsSubscription
{

    public function verifySubscriptionByCompanyId($companyId)
    {
        $subscriptionExist = CompanySubscription::all()->where('company_id', $companyId)->where('valid', true)->first();
        if (empty($subscriptionExist)) {
            return '';
        } else {
            return $subscriptionExist;
        }
    }

    public function modifyCurrentSubscription($subscriptionId)
    {
        // face inregistrarea curenta invalida pentru a crea o noua inregistrare cu modificarile facute
        $subscription = CompanySubscription::find($subscriptionId);
        //$subscription->quantity_before = $subscriptionCurrent->quantity_now;
        //$subscription->quantity_now = $subscriptionCurrent->quantity_now - 1;
        $subscription->valid = 0;
        $subscription->save();
    }
    public function saveCurrentSubscription($subscriptionCurrent)
    {
        // adauga o noua inregistrare
        
        $quantity_before = $subscriptionCurrent->quantity_now;
        $quantity_now = $subscriptionCurrent->quantity_now - 1;
        $subscription = CompanySubscription::create(
            [
                'company_id' => $subscriptionCurrent->company_id,
                'subscription_code' => $subscriptionCurrent->subscription_code,
                'subscription_category' => $subscriptionCurrent->subscription_category,
                'quantity_now' => $quantity_now,
                'quantity_before' => $quantity_before,
                'used_for' => $subscriptionCurrent->used_for,
                'service_id' => $subscriptionCurrent->service_id,
                'subscription_invoice' => $subscriptionCurrent->subscription_invoice,
                'subscription_price' => $subscriptionCurrent->subscription_price,
                'valid' => 1,


            ]

        );



        //$subscription->save();
        return $subscription;
    }
}
