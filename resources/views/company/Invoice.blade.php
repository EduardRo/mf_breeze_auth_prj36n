@extends('layout.menu')
@section('content')
    <div class="invoice container-md">

        <div class="row align-items-start">
            <div class="col col-4 align-self-start">
                <p>{{$business->business_company_name}}</p>
                <p>Adresa: {{$business->business_address}}</p>
                <p>Cod fiscal: {{$business->business_fiscal_number}}</p>
                <p>RegCom: {{$business->business_regcom}}</p>
                <p>Banca: {{$business->business_bank}}</p>
                <p>Iban: {{$business->business_iban}}</p>


            </div>
            <div class="col col-4 align-self-center">
                <div class='seriedatafactura'>
                <h2>Factura Proforma</h2>
                <p>Serie si numar: MF-878788</p>
                <p>Data factura: 08-03-2021</p>
                </div>
            </div>
            <div class="col col-4 align-self-end">
                <p>{{$company->company_name}}</p>
                <p>Adresa: {{$company->company_address}}</p>
                <p>Cod fiscal: {{$company->company_fiscalcode}}</p>
                <p>RegCom: {{$company->company_regcom}}</p>
                <p>Banca: {{$company->company_bank}}</p>
                <p>Iban: {{$company->company_bank_account}}</p>
            </div>
        </div>
        <div class="row align-items-start">
            <div class="col col-1 invoicebody">Nr. crt.</div>
            <div class="col col-4 invoicebody">Descriere produse, servicii</div>
            <div class="col col-1 invoicebody">UM</div>
            <div class="col col-1 invoicebody">Cantitate</div>
            <div class="col col-1 invoicebody">Pret Unitar<br> lei</div>
            <div class="col col-1 invoicebody">Valoare fara TVA<br> lei</div>
            <div class="col col-1 invoicebody">Valoarea TVA<br> lei</div>
            <div class="col col-2 invoicebody">Valoare cu TVA<br> lei</div>
        </div>
        <div class="row align-items-start">
            <div class="col col-1 invoicebody">1</div>
            <div class="col col-4 invoicebody">{{$InvoiceBody[0]}}</div>
            <div class="col col-1">buc</div>
            <div class="col col-1">1</div>
            <div class="col col-1">{{$InvoiceBody[1]}}</div>
            <div class="col col-1">{{$InvoiceBody[1]}}</div>
            <div class="col col-1">{{$InvoiceBody[2]}}</div>
            <div class="col col-2">{{$InvoiceBody[1]+$InvoiceBody[2]}}</div>
        </div>
        <div class="row align-items-start">
            <div class="col col-8">Total</div>

            
            <div class="col col-1">{{$InvoiceBody[1]}}</div>
            <div class="col col-1">{{$InvoiceBody[2]}}</div>
            <div class="col col-2">{{$InvoiceBody[1]+$InvoiceBody[2]}}</div>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6"></div>
        </div>
    </div>
@endsection
