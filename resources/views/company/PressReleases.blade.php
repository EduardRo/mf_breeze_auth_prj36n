@extends('layout.menu')
@section('content')

<div class="card-body">
    <div class="container">
        <h2>{{$companyname}}</h2>
        <div class="row">
            <div class="col-xl-4 mb-5 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-0">Comunicate de presa nepublicate</h5>
                                <span class="h2 font-weight-bold mb-0">3</span>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-0">Comunicate in asteptare</h5>
                                <span class="h2 font-weight-bold mb-0">2</span>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-0">Comunicate publicate</h5>
                                <span class="h2 font-weight-bold mb-0">3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php /* 
        De aici incepe blocul de comunicateDB:
        - comunicate in asteptare
        - comunicate nepublicate
        - comunicate publicate
        */ ?> 

<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header border-0" style="background:#008aa7; color:white">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Comunicate nepublicate</h3>
                </div>
                <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Comunicat</th>
                        <th scope="col">text</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($companypressreleases as $pressrelease)
                    @if($pressrelease->enabled==1 and $pressrelease->activate==0)
                    <tr>
                        <th scope="row">
                            {!!$pressrelease->title!!}
                        </th>
                        <td>
                            {!!substr($pressrelease->text,0,300)!!}
                        </td>
                        
                    </tr>
                    @endif
                    @endforeach
                    
                   
             
                </tbody>
            </table>
        </div>
    </div>



</div>
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header border-0" style="background:#008aa7; color:white">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Comunicate in asteptare</h3>
                </div>
                <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Comunicat</th>
                        <th scope="col">text</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($companypressreleases as $pressrelease)
                    @if($pressrelease->activate==1 and $pressrelease->published==0)
                    <tr>
                        <th scope="row">
                            {!!$pressrelease->title!!}
                        </th>
                        <td>
                            {!!substr($pressrelease->text,0,300)!!}
                        </td>
                        
                    </tr>
                    @endif
                    @endforeach
                    
                   
             
                </tbody>
            </table>
        </div>
    </div>



</div>
<div class="col-xl-12 mb-5 mb-xl-0">
    <div class="card shadow">
        <div class="card-header border-0" style="background:#008aa7; color:white">
            <div class="row align-items-center ">
                <div class="col">
                    <h3 class="mb-0">Comunicate publicate</h3>
                </div>
                <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Comunicat</th>
                        <th scope="col">text</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($companypressreleases as $pressrelease)
                    @if($pressrelease->published==1)
                    <tr>
                        <th scope="row">
                            {!!$pressrelease->title!!}
                        </th>
                        <td>
                            {!!substr($pressrelease->text,0,300)!!}
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
</div>

</div>


</div>

@endsection

