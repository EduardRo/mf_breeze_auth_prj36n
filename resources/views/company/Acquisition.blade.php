@extends('layout.menu')
@section('content')

    <div class="card-body grid gap-2 grid-cols-1">

        <div class="container">

            <div class="row invoice align-items-start">
                <div class="col invoice col-1 invoicebody">Nr. crt.</div>
                <div class="col invoice col-4 invoicebody">Descriere produse, servicii</div>
                <div class="col invoice col-1 invoicebody">UM</div>
                <div class="col invoice col-1 invoicebody">Cantitate</div>
                <div class="col invoice col-1 invoicebody">Pret Unitar<br> lei</div>
                <div class="col invoice col-1 invoicebody">Valoare fara TVA<br> lei</div>
                <div class="col invoice col-1 invoicebody">Valoarea TVA<br> lei</div>
                <div class="col invoice col-2 invoicebody">Valoare cu TVA<br> lei</div>
            </div>
            <div class="row invoice align-items-start">
                <div class="col invoice col-1 invoicebody">1</div>
                <div class="col invoice col-4 invoicebody">{{ $subscription->subscription_description }}</div>
                <div class="col invoice col-1">buc</div>
                <div class="col invoice col-1">1</div>
                <div class="col invoice col-1">{{ $subscription->subscription_price_ron }}</div>
                <div class="col invoice col-1">{{ $subscription->subscription_price_ron }}</div>
                <div class="col invoice col-1">{{ round($subscription->subscription_price_ron * 0.19, 2) }}</div>
                <div class="col invoice col-2">{{ round($subscription->subscription_price_ron * 1.19, 2) }}</div>
            </div>
            <div class="row invoice align-items-start">
                <div class="col invoice col-8">Total</div>


                <div class="col invoice col-1">{{ $subscription->subscription_price_ron }}</div>
                <div class="col invoice col-1">{{ round($subscription->subscription_price_ron * 0.19, 2) }}</div>
                <div class="col invoice col-2">{{ round($subscription->subscription_price_ron * 1.19, 2) }}</div>
            </div>
            <div class="row invoice">
                <div class="col-6"></div>
                <div class="col-6"></div>
            </div>

            <form method="post" action="/acquisition/store" >
                @csrf
                <input type='text' name="subscriptionName" value='{{$subscription->subscription_name}}' hidden>
                <button class='btn btn-primary' type='submit'>Creaza Factura Proforma</button>
            </form>
        </div>
        <div class="container">
            <p>*Pretul este calculat la cursul euro de 4,9251.<br>
            ** Cursul se poate modifica in functie de evolutia eur/ron.</p>

        </div>

    </div>
@endsection
