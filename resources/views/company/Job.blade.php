@extends('layout.menu')
@section('content')
<div class="container">
<div class="card-body grid gap-2 grid-cols-1">
<h3>Denumire Companie: {{$companyname}}</h3>   


<div class="card">
    <div class="card-header bg-info">
        <h6 class="text-white">{{$job->job_name}}</h6>
    </div>
    
<div class="box-border padding-2 md:box-content text-black font-200 bg-blue-300 px-4 py-4">
   
    <p>Nivel de pregatire: {{$job->job_level}}</p>
    <p>Tip: {{$job->jb_type}}</p>
    <p>Descriere: {!!$job->job_description!!}</p>
    <p>Responsabilitati: {!!$job->job_responsabilities!!}</p>
    <p>Ce trebuie sa stii: {!!$job->job_skills!!}</p>
    <p>Ar fi bine sa cunosti: {!!$job->job_things_nice_to_have!!}</p>
    <p>Trimiteti CV la: {{$job->email}}</p>
    <p>Poti sa ne suni la: {{$job->phone}}</p>   
    <a href="{{ url('/job/publishing/' . $job->id) }}" class="btn btn-lg btn-primary">Publica</a>
    <a href="{{ url('/job/edit/' . $job->id) }}" class="btn btn-lg btn-primary">Modifica</a>
   
    
</div>
</div>
</div>
</div>
@endsection