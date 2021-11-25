
   @extends('layout.menu')
   @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Facturi Proforma In Curs de Plata</h6>
                    </div>
                    <div class="card-body col-md-12 mt-2">
                       <table class="table table-bordered table-hover">
                        <thead>
                            <th>Companie</th>
                            <th>Serie/Nr</th>
                            <th>Servicii</th>
                            
                            <th>Valoare</th>
                            <th>TVA</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Explicatii plata</th>
                        </thead>
                        <tbody>
                           
                    
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->invoice_company_name}}</td>
                                <td>{{$invoice->invoice_serie}}-{{$invoice->invoice_number}}</td>
                                <td>{{$invoice->type}}-{{$invoice->type_id}} <br> {{$invoice->subscription_name}} - {{$invoice->subscription_description}}</td>
                                <td>{{$invoice->invoice_amount}}</td>
                                <td>{{$invoice->invoice_amount_vat}}</td>
                                <td>{{$invoice->invoice_total_amount}}</td>
                                <td>{{$invoice->paid}}</td>
                                <td>
                                    <form style="display:inline-flex" action="" method="POST">
                                        @csrf
                                        <a class="btn btn-sm btn-success" href="">Platita</a>
                                        <input type="text" class="input-sm" style="margin-left:5px;border-top:hidden; border-left:hidden; border-right:hidden;"> 
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                       
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </div>


@endsection
