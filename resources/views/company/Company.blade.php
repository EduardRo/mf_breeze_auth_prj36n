
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
                          
                            <div class="row">
                                RegCom: {{$company->company_regcom}}
                            </div>
                            <div class="row">
                               Cod fiscal: {{$company->company_fiscalcode}}
                            </div>
                            <div class="row">
                               Capital: {{$company->company_capital}}
                            </div>
                            <div class="row">
                               Banca: {{$company->company_bank}}
                            </div>
                            <div class="row">
                               IBAN: {{$company->company_bank_account}}
                            </div>
                            <div class="row">
                                Localitate: {{$company->company_city}}
                            </div>
                            <div class="row">
                                Adresa: {{$company->company_address}}
                            </div>
                            <div class="row">
                                Persoane de contact: {{$company->company_contact}}
                            </div>
                            <div class="row">
                                Email: {{$company->company_email}}
                            </div>
                            <div class="row">
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
