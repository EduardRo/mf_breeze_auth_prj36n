@extends('layout.menu')
@section('content')
<h1>ublishing</h1>
<div class="card-body grid gap-2 grid-cols-1">
@if ($pressReleasedNotPublished)
    @foreach( $pressReleasedNotPublished as $pressRelease)
    <div class="card-header bg-info">{!!$pressRelease->title!!}</div>
    <div>{!!$pressRelease->text!!}</div>
    <div class="form-group text-center">
        <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Modifica Comunicatul de Presa</a>
        <a href="{{ url('/companypresentation/edit') }}" class="btn btn-xs btn-primary pull-right">Publicare Comunicat de Presa</a>
        
    </div>
    @endforeach

@endif
    


</div>
@endsection