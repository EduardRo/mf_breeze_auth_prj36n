@extends('layout.menu')
@section('content')


<div class="container">
    <h2 class="card-title text-uppercase text-muted mt-3 mb-0">Comunicate de presa <span class="h2 font-weight-bold mb-0">
        {{$companyname}}</span></h2>
    <div class="row">
    <div class="col-xl-12 mb-5 mt-5">
        <div class="card shadow">
            <div class="card-header border-0" style="background:#008aa7; color:white">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Job-uri nepublicate</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table  table-hover align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Denumire Job</th>
                            <th scope="col">Descriere</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companyjobs as $job)
                        @if($job->enabled==1 and $job->activate==0)
                        <tr>
                            <th scope="row">
                                {!!$job->job_name!!}
                            </th>
                            <td>
                                {!!substr($job->job_description,0,300)!!}
                            </td>
                            <td><a href="{{ url('/jobs/' . $job->id) }}" class="btn btn-xs btn-primary pull-right">Vizualizeaza</a></td>
                         </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
