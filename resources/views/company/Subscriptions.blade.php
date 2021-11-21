@extends('layout.menu')

@section('content')
<div class="container">
    <div class="card-body">
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">Companie</h6>
            </div>

            <div class="box-border row">
                <div class="col-sm-3">
                <div class="card" style="margin:10px;padding:5px">
                    <img src="/img/tile.jpg" class="card-img-top" alt="..." style="max-height: 300px">
                    <h3>Prezentare Companie</h3>
                    <div class="card-body">
                        <p class="card-text">Perioada: 1 and de zile</p>
                        <p class="card-text">Pret: 300 Eur fara T.V.A.</p>
                        <a href="/acquisition/PRZCO01" class="btn btn-primary">Cumpar</a>

                    </div>
                </div>
                </div>

            </div>

        </div>

        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">Comunicate de presa</h6>
            </div>

            <div class="box-border row">
                <div class="col-sm-3">
                    <div class="card" style="margin:10px;padding:5px">
                        <img src="/img/tile1.jpg" class="card-img-top" alt="...">
                        <h3>1 Comunicat de presa</h3>
                        <div class="card-body">
                            <p class="card-text">Perioada: 1 an de zile</p>
                            <p class="card-text">Pret: 100 Eur fara T.V.A.</p>
                            <a href="/acquisition/PRZCO01" class="btn btn-primary">Cumpar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" style="margin:10px;padding:5px">
                        <img src="/img/tile2.jpg" class="card-img-top" alt="...">
                        <h3>3 Comunicate de presa</h3>
                        <div class="card-body">
                            <p class="card-text">Perioada: 1 an de zile</p>
                            <p class="card-text">Pret: 240 Eur fara T.V.A.</p>
                            <a href="/acquisition/PRZCO01" class="btn btn-primary">Cumpar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card" style="margin:10px;padding:5px">
                        <img src="/img/tile3.jpg" class="card-img-top" alt="...">
                        <h3>6 Comunicate de presa</h3>
                        <div class="card-body">
                            <p class="card-text">Perioada: 1 an de zile</p>
                            <p class="card-text">Pret: 400 Eur fara T.V.A.</p>
                            <a href="/acquisition/PRZCO01" class="btn btn-primary">Cumpar</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="card">
            <div class="card-header bg-info">
                <h6 class="text-white">Job-uri</h6>
            </div>

            <div class="box-border row">
                @foreach($subscriptions as $subscription)
                <div class="col-sm-3">
                    
                    <div class="card" style="margin:10px;padding:5px">
                        <img src=" ..." class="card-img-top" alt="...">
                        <h3>{{$subscription->subscription_name}}</h3>
                        <div class="card-body">
                            <p class="card-text">Perioada: {{$subscription->period}} luni</p>
                            <p class="card-text">{{$subscription->price_eur}} eur</p>
                            <a href="/acquisition/JOB01" class="btn btn-primary">Cumpar</a>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
@section('content1')


@endsection
