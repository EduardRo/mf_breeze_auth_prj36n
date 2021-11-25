
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
                        <h6 class="text-white">Facturi</h6>
                    </div>
                    <div class="card-body col-md-12 mt-2">
                        <div class="card">
                        <div class="card-header bg-info"  style="background-color: #b81717!important;">
                            <h6 class="text-white">Facturi proforma in curs</h6>
                        </div>
                        <button class="mt-3" style="border: none; background:none; padding:10px;">
                            <a href="{{ url('/administration/facturiproformaincurs') }}" class="btn btn-xs btn-primary pull-right">Administrare</a>    
                        </button>
                        </div>
                    </div>
                    <div class="card-body col-md-12 my-2">
                        <div class="card">
                        <div class="card-header bg-info" style="background-color: #1778b8!important;">
                            <h6 class="text-white">Facturi proforma anulate</h6>
                        </div>
                        <button class="mt-3" style="border: none; background:none; padding:10px;">
                            <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Administrare</a>    
                        </button>
                        </div>
                    </div>
                    <div class="card-body col-md-12 mt-2">
                        <div class="card">
                        <div class="card-header bg-info">
                            <h6 class="text-white">Facturi proforma platite</h6>
                        </div>
                        
                            <button class="mt-3" style="border: none; background:none; padding:10px;">
                                <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Administrare</a>    
                            </button>
                        
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">Abonamente</h6>
                    </div>
                    <div class="card-body">
                        <div class="grid gap-2 grid-cols-1">Introducere Abonament</div>
                     </div>
                     <div class="card-body">
                        <div class="grid gap-2 grid-cols-1">Introducere Servicii</div>
                     </div>
                </div>
                
            </div>
        </div>
    </div>


@endsection
