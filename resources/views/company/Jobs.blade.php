@extends('layout.menu')
@section('content')

<div class="card-body grid gap-2 grid-cols-1">
    <h1>Joburi</h1>
<h2>{{$companyname}}</h2>


@foreach($companyjobs as $job)

    
<div class="box-border padding-2 md:box-content text-white font-200 bg-blue-300 px-2 py-2">
    <h2>{{$job->job_name}}</h2>
    <p>{{Str::limit($job->job_description,50)}}</p>
    
    

   
    <a href="{{ url('/jobs/' . $job->id) }}" class="btn btn-xs btn-primary pull-right">Vizualizeaza</a>
    
</div>
@endforeach
</div>
@endsection