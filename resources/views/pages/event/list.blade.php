@extends('layout.master')
@section('title', 'All Events')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">Events</h4>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
            <div class="list-group">
                @foreach($events as $event)
                    <span href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $event->name }}</h4>
                        <p class="list-group-item-text">{{ $event->about }}</p>
                        <span><b>Amount:</b> {{ $event->cost }}</span>
                        <a href="/event/{{ $event->id }}" class="btn btn-sm btn-primary pull-right"> VIEW MORE</a>
                    </span>
                @endforeach
            </div>
            <center>
                {{ $events->links() }}
            </center>
        </div>
    </div>
</div>

@stop