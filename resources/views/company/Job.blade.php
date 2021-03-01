@extends('layout.menu')
@section('content')

<div class="card-body grid gap-2 grid-cols-1">
   
<h2>{{$companyname}}</h2>



<div class="card">
    <div class="card-header bg-info">
        <h6 class="text-white">{{$job->job_name}}</h6>
    </div>
    
<div class="box-border padding-2 md:box-content text-white font-200 bg-blue-300 px-2 py-2">
    
    <p>Nivel de pregatire: {{$job->job_level}}</p>
    <p>Tip: {{$job->job_type}}</p>
    <p>Descriere: {{$job->job_description}}</p>
    <p>Responsabilitati: {{$job->job_responsabilities}}</p>
    <p>Ce trebuie sa stii: {{$job->job_skills}}</p>
    <p>Ar fi bine sa cunosti: {{$job->job_things_nice_to_have}}</p>
    <p>Trimiteti CV la: {{$job->email}}</p>
    <p>Poti sa ne suni la: {{$job->phone}}</p>
    

   
   
    
</div>

</div>
</div>
@endsection