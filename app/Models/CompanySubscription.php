<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySubscription extends Model
{
    //use HasFactory;
    protected $fillable = [
        'company_id',
        'subscription_id',
        'subscription_name',
        'subscription_category',
        'subscription_type',
        'quantity_now',
        'quantity_before',
        'used_for',
        'subscription_invoice',
        'subscription_price_eur',
        'subscription_price_ron',
        'activated',
        'paid',
        'valid',


    ];
}
