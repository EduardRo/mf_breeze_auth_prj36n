<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySubscription extends Model
{
    //use HasFactory;
    protected $fillable = [
        'company_id',
        'subscription_code',
        'subscription_category',
        'quantity_now',
        'quantity_before',
        'used_for',
        'service_id',
        'subscription_invoice',
        'subscription_price',
        'valid',


    ];
}
