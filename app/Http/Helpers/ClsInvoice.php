<?php 
namespace App\Http\Helpers;
use App\Models\Company;
use App\Models\Service;

class ClsInvoice {

    public function createInvoice(){
        $clsCompany = new Company;
        $company = $clsCompany::all();
        return $company;

    }

    public function createInvoiceBody(){

    }

    public function createInvoiceSerie($typeOfService){




    }



}

    




?>