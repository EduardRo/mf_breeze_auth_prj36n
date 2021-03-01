<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    // use HasFactory;
    protected $fillable = [
        'company_id',
        'job_name',
        'job_type',
        'job_level',
        'job_description',
        'job_responsabilities',
        'job_skills',
        'job_things_nice_to_have',
        'job_offer',
        'enabled',
        'email',
        'phone',
    ];
}
