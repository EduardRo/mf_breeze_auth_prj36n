@extends('layout.menu')
@section('content')
<div class="container">
<div class="col-xl-12 mb-5">
<h2 class="card-title text-uppercase text-muted mb-0">Anunturi job - <span class="h2 font-weight-bold mb-0">
    {{$companyname}}</span></h2>
</div>
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
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobsNotPaidNotPublished as $job)
                    @if($job->enabled==1 and $job->activate==0)
                    <tr>
                        <th scope="row">
                            {!!$job->job_name!!}
                        </th>
                        <td>
                            {!!substr($job->job_description,0,300)!!}
                        </td>
                        
                        <td class="text-right">
                            <div class="dropdown">
                                
                              <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Alege Optiunea
                                <x-heroicon-o-dots-vertical class="h-6 w-6 " />
                              </a>
                              
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                                <a class="dropdown-item" href="{{ url('/jobs/' . $job->id) }}">Vizualizeaza</a>
                                <a class="dropdown-item" href="#">Modifica</a>
                                <a class="dropdown-item" href="#">Publica</a>
                              </div>
                            </div>
                          </td>
                     </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection

