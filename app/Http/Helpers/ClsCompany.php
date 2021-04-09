<?php

namespace App\Http\Helpers;

use App\Models\Company;

class ClsCompany
{




    public function retrieveCompanyId($userId)
    {


        $company = Company::all()->where('user_id',$userId)->first();


        return $company;

        // return 'sunt in clasa clsCompanies in retrieveCompanyId';
    }

    public function retrieveDataCompanyById($userId)
    {


        $company = Company::all()->where('user_id',$userId)->first();


        return $company;

        // return 'sunt in clasa clsCompanies in retrieveCompanyId';
    }

    public function companyData()
    {
        // give data of the current user


      

        // return 'sunt in clasa clsCompanies in retrieveCompanyId';
    }
}
?>