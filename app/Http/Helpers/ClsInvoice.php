<?php

namespace App\Http\Helpers;

use App\Models\Company;
use App\Models\Service;
use App\Models\Invoice;
use App\Models\InvoiceBody;

class ClsInvoice
{
    /* 
    Have function for creation of invoice depending on the product 
    Verifiy is it is a subscription and the data of subscription is respected
    The number of publications and the time of subscription

    If no subscription is found then is searching for individual product



    */
    public function createInvoiceSerieNumberDate($subscriptionName, $subscriptionCategory, $companyId)
    {
        // Se creeaza numarul facturii in functie de abonament
        $invoiceSerie = $subscriptionCategory;
        $noOfCh = strlen($subscriptionCategory);
        $noOfSubscriptionName = substr($subscriptionName, $noOfCh);
        $noOfInvoicesBySerie = Invoice::where('invoice_serie', $invoiceSerie)->count();
        // se adauga 1 la numarul de facturi anterioare
        $noOfInvoicesBySerie = $noOfInvoicesBySerie + 1;
        $noOfInvoices = Invoice::All()->count();
        $noOfInvoices=$noOfInvoices+1;
        $invoiceNumber =
            $noOfSubscriptionName . "7" . $companyId
            . "5" . $noOfInvoicesBySerie . "3" . $noOfInvoices;
        $invoiceSerieNumber=[];
        $invoiceDate = date("d-m-Y");
        array_push($invoiceSerieNumber,$invoiceSerie);
        array_push($invoiceSerieNumber,$invoiceNumber);
        array_push($invoiceSerieNumber,$invoiceDate);


        return $invoiceSerieNumber;
    }
    public function createInvoice()
    {

        $clsCompany = new Company;
        $company = $clsCompany::all();
        return $company;
    }
    public function companyData()
    {
        $clsCompany = new Company;
        $company = $clsCompany::all();
        return $company;
    }

    public function createInvoiceBodyByServiceId($ServiceId)
    {
        $service = Service::all()->where('id', $ServiceId)->first();
        $invoiceBody = [];
        $tva = $service->service_unit_price * 0.19;
        array_push($invoiceBody, $service->service_name, $service->service_unit_price, $tva);
        return $invoiceBody;
    }

    public function createInvoiceSerie($typeOfService)
    {
        // Create the Invoice Serie depending of the type of product
        // produs individual 1 multiplu 2 (gen abonament)
        // trebuie ! Atentie ca variabila is id de fapt !!!
        $categoryOfService = Service::all()->where('id', $typeOfService)->first();
        $userId = auth()->id();
        $serie = 'MF' . $categoryOfService->service_category;
        $nr = $categoryOfService->service_code . date('d') . date('m') . $userId;
        $data = date('d') . '-' . date('m') . '-' . date('Y');

        return array($serie, $nr, $data);
    }


    public function findSerieNoOfInvoiceById($id) {
        // return the invoice serie and number based on id

        $InvoiceSerie = Invoice::select('id','invoice_serie', 'invoice_number')->where('id',$id)->first();
        return $InvoiceSerie;

    }
    public function findInvoiceBodyByInvoiceId($invoiceId) {
        // return the invoice serie and number based on id

        $InvoiceBody = InvoiceBody::all()->where('invoice_id',$invoiceId)->first();
        return $InvoiceBody;

    }
}
