<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPressRelease extends Model
{
    // use HasFactory;
    protected $fillable = [
        'company_id',
        'title',
        'text',
        'enabled',
        'activated',
        'paid',
        'published',

    ];
}
