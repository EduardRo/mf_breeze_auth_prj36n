@extends('layout.menu')
@section('content')
<div class="container">
    <div class="card-body grid gap-2 grid-cols-1">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">{{ $presentation->company_name }}</h6>
            </div>

            <div class="box-border padding-2 md:box-content font-200 bg-blue-300 px-2 py-2">
                <div class="box-border padding-2 md:box-content  bg-blue-300  px-2 py-2">
                    <h3>Descriere:</h3> {!! $presentation->company_description !!}
                </div>
                <div class="box-border padding-2 md:box-content  bg-blue-300  px-2 py-2">
                    <h3>Servicii:</h3>  
                    {!! $presentation->company_services !!}
                </div>
                <div class="box-border padding-2 md:box-content  bg-blue-300  px-2 py-2">
                    <h3>Management Team:</h3> {!! $presentation->company_management_team !!}
                </div>
                <div class="box-border padding-2 md:box-content  bg-blue-300  px-2 py-2">
                    <h3>Addresa:</h3> {!! $presentation->company_address !!}
                </div>
                <div class="box-border padding-2 md:box-content  bg-blue-300  px-2 py-2">
                    <h3>Contact:</h3> {!! $presentation->company_contact !!}
                </div>
                 <div class="form-group text-center">
                    <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Modifica Prezentarea Companiei</a>
                    
                </div>
                @isset($message)
                    <p Style="background:rgb(255, 255, 255);color:rgb(255, 0, 0);padding:20px 0 20px 15px">{{$message}}</p>
                @endisset
            </div>

        </div>
    </div>
</div>    
@endsection
