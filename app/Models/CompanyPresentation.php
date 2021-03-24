<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPresentation extends Model
{
    // use HasFactory;
    protected $fillable = [
        'company_id',
        'company_name',
        'company_description',
        'company_services',
        'company_management_team',
        'company_address',
        'company_contact',
        'enabled',
        'activated',
        'paid',
        'published',
        'deleted'
    ];
}
