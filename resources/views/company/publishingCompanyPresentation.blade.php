@extends('layout.menu')
@section('content')
<h1>Prezentare Companie - Publicare</h1>

@if ($presentationNotPublished)
<div class="card-body grid gap-2 grid-cols-1">
<div class="card">
    <div class="card-header bg-info text-white" >{{$presentationNotPublished->company_name}}</div>
    <div class="box-border padding-2 md:box-content font-200 bg-blue-300 px-2 py-2">
    @if ($presentationNotPublished->company_description)
    <div>{!!$presentationNotPublished->company_description!!}</div>
    @endif
    @if ($presentationNotPublished->company_services)
    <div>{!!$presentationNotPublished->company_services!!}</div>
    @endif
    @if ($presentationNotPublished->company_management_team)
    <div>{!!$presentationNotPublished->company_management_team!!}</div>
    @endif
    @if ($presentationNotPublished->company_address)
    <div>{!!$presentationNotPublished->company_address!!}</div>
    @endif
    @if ($presentationNotPublished->company_contact)
    <div>{!!$presentationNotPublished->company_contact!!}</div>
    @endif
    </div>
    <div class="form-group text-center">
        <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Modifica Presentare Companie</a>
        <a href="{{ url('/companypresentation/publishing/'.$presentationNotPublished->id) }}" class="btn btn-xs btn-primary pull-right">Publicare Presentare Companie</a>
        
    </div>
</div>
</div>
@endif
    



@endsection