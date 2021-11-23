@extends('layout.menu')

@section('content')
<div class="container">
    <div class="card-body">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">Companie</h6>
            </div>

            <div class="box-border row">
                <!-- prezentare companie --> 

            </div>

        </div>

        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">Comunicate de presa</h6>
            </div>

            <div class="box-border row flex items-stretch">
                @foreach($subscriptions as $subscription)
                @if ($subscription->subscription_category=='PRL')
                    
               
                <div class="col-sm-3 gap-4">
                    
                    <div class="card" 
                    style="background: #273aa3;
                    color: #fff;
                    ">
                        
                        <h4 style="padding:10px;">{{$subscription->subscription_name}}</h4>
                        <div class="card-body" style="margin:1px;
                        background: #5c6ed8;
                        color: #fff;
                        padding: 2px 2px 2px;">
                            <p class="card-text">Perioada: {{$subscription->period}} luni</p>
                            <p class="card-text">{{$subscription->price_eur}} eur</p>
                            <a href="/acquisition/{{$subscription->subscription_code}}" class="btn btn-primary">Cumpar</a>
                        </div>
                    </div>
                    
                </div>
                @endif
                @endforeach
                

            </div>

        </div>
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">Job-uri</h6>
            </div>

            <div class="box-border row">
                @foreach($subscriptions as $subscription)
                @if ($subscription->subscription_category=='Job')
                    
               
                <div class="col-sm-3 gap-4">
                    
                    <div class="card" 
                    style="margin:0px;
                    background: #273aa3;
                    color: #fff;
                    padding: 1px 1px 1px;">
                        
                        <h4>{{$subscription->subscription_name}}</h4>
                        <div class="card-body" style="margin:0px;
                        background: #5c6ed8;
                        color: #fff;
                        padding: 10px 10px 10px;">
                            <p class="card-text">Perioada: {{$subscription->period}} luni</p>
                            <p class="card-text">{{$subscription->price_eur}} eur</p>
                            <a href="/acquisition/{{$subscription->subscription_code}}" class="btn btn-primary">Cumpar</a>
                        </div>
                    </div>
                    
                </div>
                @endif
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
@section('content1')


@endsection
