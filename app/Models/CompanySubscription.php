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
        'invoice_id',
        'subscription_name',
        'subscription_description',
        'subscription_category',
        'subscription_category_name',
        'subscription_category_description',
        'type',
        //'quantity_now',
        //'quantity_before',
        //'used_for',
        //'subscription_invoice_id',
        //'subscription_invoice_serie_number',
        'price_eur',
        'price_ron',
        'enabled',
        'period',
        'activated',
        'paid',
        //'published',
        


    ];
}
