@extends('layout.menu')
@section('content')

<div class="card-body">
    <div class="container">
<h2>{{$companyname}}</h2>
<div class="row blue"><b>Comunicate de presa nepublicate</b></div> 
@foreach($companypressreleases as $pressrelease)
@if($pressrelease->enabled==1 and $pressrelease->activate==0)
     
    <div class="row"><b>{!!$pressrelease->title!!}</b></div>
    <div class="row">{!!substr($pressrelease->text,0,300)!!}</div>
    <hr>
@endif   

@endforeach
<div class="row pink"><b>Comunicate de presa in asteptare</b></div>  
@foreach($companypressreleases as $pressrelease)
@if($pressrelease->activate==1 and $pressrelease->published==0)
    
    <div class="row"><b>{!!$pressrelease->title!!}</b></div>
    <div class="row">{!!substr($pressrelease->text,0,300)!!}</div>
    <hr>
@endif  
@endforeach
<div class="row green"><b>Comunicate de presa publicate</b></div>  
@foreach($companypressreleases as $pressrelease)
@if($pressrelease->published==1)
    
    <div class="row"><b>{!!$pressrelease->title!!}</b></div>
    <div class="row">{!!substr($pressrelease->text,0,300)!!}</div>
    <hr>
@endif  
@endforeach



</div>
</div>
@endsection