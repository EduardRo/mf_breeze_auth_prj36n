@extends('layout.menu')
@section('content')

    <div class="container">
        <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
            <div class="card-header bg-info">
            <h6 class="text-white">Joburi - {{ $companyname }}</h6>
            
            </div>
            @foreach ($companyjobs as $job)
                <div class="card-body">
                    <h2>{{ $job->job_name }}</h2>
                    <p>{{ Str::limit($job->job_description, 150) }}</p>
                    <a href="{{ url('/jobs/' . $job->id) }}" class="btn btn-xs btn-primary pull-right">Vizualizeaza</a>
                </div>
            @endforeach
            </div>
        </div>
        </div>
 
    </div>
@endsection
