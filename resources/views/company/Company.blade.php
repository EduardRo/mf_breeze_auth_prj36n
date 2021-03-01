
   @extends('layout.menu')
   @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Date companie: {{$company->company_name}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="grid gap-2 grid-cols-1">
                          
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                                RegCom: {{$company->company_regcom}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                               Cod fiscal: {{$company->company_fiscalcode}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                               Capital: {{$company->company_capital}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                               Banca: {{$company->company_bank}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                               IBAN: {{$company->company_bank_account}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                                Localitate: {{$company->company_city}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                                Adresa: {{$company->company_address}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                                Persoane de contact: {{$company->company_contact}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                                Email: {{$company->company_email}}
                            </div>
                            <div class="box-border padding-2 md:box-content text-white font-extrabold bg-blue-300  px-2 py-2">
                                Telefon: {{$company->company_phone}}
                            </div>

                            <div class="form-group text-center">
                                <a href="{{ url('/company/edit') }}" class="btn btn-xs btn-primary pull-right">Modifica Datele Companiei</a>
                                
                            </div>
                            @isset($message)
                           
                            
                            <h2 Style="background:rgb(93, 126, 141);color:rgb(255, 255, 255);padding:20px 0 20px 15px">{{$message}}</h2>
                                
                            @endisset

                            
                            
                    </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>


@endsection
