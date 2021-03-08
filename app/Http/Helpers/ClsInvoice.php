<?php 
namespace App\Http\Helpers;
use App\Models\Company;
use App\Models\Service;

class ClsInvoice {
    /* 
    Have function for creation of invoice depending on the product 
    Verifiy is it is a subscription and the data of subscription is respected
    The number of publications and the time of subscription

    If no subscription is found then is searching for individual product



    */
    public function createInvoice(){
        $clsCompany = new Company;
        $company = $clsCompany::all();
        return $company;

    }

    public function createInvoiceBodyByServiceId($ServiceId){
        $service = Service::all()->where('id',$ServiceId)->first();
        $invoiceBody=[];
        $tva = $service->service_unit_price *0.19;
        array_push($invoiceBody, $service->service_name, $service->service_unit_price, $tva);
        return $invoiceBody;





    }

    public function createInvoiceSerie($typeOfService){
        // Create the Invoice Serie depending of the type of product



    }



}

    




?>