@extends('layout.menu')
@section('content')
<h1>Press Releases</h1>
<div class="card-body grid gap-2 grid-cols-1">
<h2>{{$companyname}}</h2>

@foreach($companypressreleases as $pressrelease)

    
<div class="box-border padding-2 md:box-content text-white font-200 bg-blue-300 px-2 py-2">
    <h2>{{$pressrelease->title}}</h2>
    <p>{{$pressrelease->text}}</p>
</div>
@endforeach
</div>
@endsection