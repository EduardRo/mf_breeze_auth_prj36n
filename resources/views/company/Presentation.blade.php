@extends('layout.menu')
@section('content')

    <div class="card-body grid gap-2 grid-cols-1">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">{{ $presentation->company_name }}</h6>
            </div>

            <div class="box-border padding-2 md:box-content text-white font-200 bg-blue-300 px-2 py-2">
                <div class="box-border padding-2 md:box-content text-white  bg-blue-300  px-2 py-2">
                    <p style='color:black'>Descriere:</p> {{ $presentation->company_description }}
                </div>
                <div class="box-border padding-2 md:box-content text-white  bg-blue-300  px-2 py-2">
                    <p style='color:black'>Servicii:</p>  {{ $presentation->company_services }}
                </div>
                <div class="box-border padding-2 md:box-content text-white  bg-blue-300  px-2 py-2">
                    <p style='color:black'>Management Team:</p> {{ $presentation->company_management_team }}
                </div>
                <div class="box-border padding-2 md:box-content text-white  bg-blue-300  px-2 py-2">
                    <p style='color:black'>Addresa:</p> {{ $presentation->company_address }}
                </div>
                <div class="box-border padding-2 md:box-content text-white  bg-blue-300  px-2 py-2">
                    <p style='color:black'>Contact:</p> {{ $presentation->company_contact }}
                </div>
                
                

                
                
                


                <div class="form-group text-center">
                    <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Modifica Prezentarea Companiei</a>
                    
                </div>
                @isset($message)
                    <h2 Style="background:rgb(93, 126, 141);color:rgb(255, 255, 255);padding:20px 0 20px 15px">{{$message}}</h2>
                @endisset
            </div>

        </div>
    </div>
@endsection
