@extends('layout.menu')
@section('content')
    <div class="invoice container-md">

        <div class="row invoice align-items-start">
            <div class="col invoice col-4 align-self-start">
                
                <p><span class='descr'>Furnizor:</span> {{$business->business_company_name}}</p>
                <p><span class='descr'>Adresa:</span> {{$business->business_address}}</p>
                <p><span class='descr'>Cod fiscal:</span> {{$business->business_fiscal_number}}</p>
                <p><span class='descr'>RegCom:</span> {{$business->business_regcom}}</p>
                <p><span class='descr'>Banca:</span> {{$business->business_bank}}</p>
                <p><span class='descr'>Iban:</span> {{$business->business_iban}}</p>


            </div>
            <div class="col invoice col-4 align-self-center">
                <div class='seriedatafactura'>
                <h2>Factura Proforma</h2>
                <p>Serie si numar: {{$InvoiceSerie[0]}} - {{$InvoiceSerie[1]}}</p>
                <p>Data factura: {{$InvoiceSerie[2]}}</p>
                </div>
            </div>
            <div class="col invoice col-4 align-self-end">
                <p>Client: {{$company->company_name}}</p>
                <p>Adresa: {{$company->company_address}}</p>
                <p>Cod fiscal: {{$company->company_fiscalcode}}</p>
                <p>RegCom: {{$company->company_regcom}}</p>
                <p>Banca: {{$company->company_bank}}</p>
                <p>Iban: {{$company->company_bank_account}}</p>
            </div>
        </div>
        <div class="row invoice align-items-start">
            <div class="col invoice col-1 invoicebody">Nr. crt.</div>
            <div class="col invoice col-4 invoicebody">Descriere produse, servicii</div>
            <div class="col invoice col-1 invoicebody">UM</div>
            <div class="col invoice col-1 invoicebody">Cantitate</div>
            <div class="col invoice col-1 invoicebody">Pret Unitar<br> lei</div>
            <div class="col invoice col-1 invoicebody">Valoare fara TVA<br> lei</div>
            <div class="col invoice col-1 invoicebody">Valoarea TVA<br> lei</div>
            <div class="col invoice col-2 invoicebody">Valoare cu TVA<br> lei</div>
        </div>
        <div class="row invoice align-items-start">
            <div class="col invoice col-1 invoicebody">1</div>
            <div class="col invoice col-4 invoicebody">{{$InvoiceBody[0]}}</div>
            <div class="col invoice col-1">buc</div>
            <div class="col invoice col-1">1</div>
            <div class="col invoice col-1">{{$InvoiceBody[1]}}</div>
            <div class="col invoice col-1">{{$InvoiceBody[1]}}</div>
            <div class="col invoice col-1">{{$InvoiceBody[2]}}</div>
            <div class="col invoice col-2">{{$InvoiceBody[1]+$InvoiceBody[2]}}</div>
        </div>
        <div class="row invoice align-items-start">
            <div class="col invoice col-8">Total</div>

            
            <div class="col invoice col-1">{{$InvoiceBody[1]}}</div>
            <div class="col invoice col-1">{{$InvoiceBody[2]}}</div>
            <div class="col invoice col-2">{{$InvoiceBody[1]+$InvoiceBody[2]}}</div>
        </div>
        <div class="row invoice">
            <div class="col-6"></div>
            <div class="col-6"></div>
        </div>
    </div>
@endsection
