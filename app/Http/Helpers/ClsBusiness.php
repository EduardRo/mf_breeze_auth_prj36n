<?php

namespace App\Http\Helpers;

use App\Models\Business;

class ClsBusiness
{




    public function businessData()
    {


        $business = Business::all()->where('valabil',1)->first();


        return $business;

        
    }


}
