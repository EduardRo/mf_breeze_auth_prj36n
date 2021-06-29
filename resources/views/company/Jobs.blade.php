@extends('layout.menu')
@section('content')

    <div class="container-md">
        <div>
            <h1>Joburi</h1>
            <h2>{{ $companyname }}</h2>
            @foreach ($companyjobs as $job)
                <div>
                    <h2>{{ $job->job_name }}</h2>
                    <p>{{ Str::limit($job->job_description, 150) }}</p>
                    <a href="{{ url('/jobs/' . $job->id) }}" class="btn btn-xs btn-primary pull-right">Vizualizeaza</a>
                </div>
            @endforeach
        </div>
 
    </div>
@endsection
