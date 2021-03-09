@extends('layout.menu')
@section('content')
<h1>ublishing</h1>
<div class="card-body grid gap-2 grid-cols-1">
@if ($pressReleasedNotPublished)
    @foreach( $pressReleasedNotPublished as $pressRelease)
    <div class="card-header bg-info">{!!$pressRelease->title!!}</div>
    <div>{!!substr($pressRelease->text,0,200)!!}</div>
    <div class="form-group text-center">
        <a href="{{ url('/pressrelease/edit') }}" class="btn btn-xs btn-primary pull-right">Modifica Comunicatul de Presa</a>
        <a href="{{ url('/pressrelease/publishing/'.$pressRelease->id) }}" class="btn btn-xs btn-primary pull-right">Publicare Comunicat de Presa</a>
        
    </div>
    @endforeach

@endif
    


</div>
@endsection