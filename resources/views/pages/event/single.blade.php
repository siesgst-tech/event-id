@extends('layout.master')
@section('title', 'Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <div class="col col-xs-12 col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1">
            <h4>{{ $event->name }}</h4>
            <p>{{ $event->description }}</p>
            <blockquote>
                <h5>About</h5>
                <p>{{ $event->about }}</p>
            </blockquote>
            <blockquote>
                <h5>Rules</h5>
                <p>{{ $event->rules }}</p>
            </blockquote>
            <blockquote>
                <h5>Gameplay</h5>
                <p>{{ $event->gameplay }}</p>
            </blockquote>
        </div>
        <div class="col col-xs-12 col-lg-3 col-md-3">
            @if(Session::has('error'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! Session::get('error') !!}
                </div>
             @endif
             @if(Session::has('success'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ Session::get('success') }}
                </div>
             @endif
            <p align="center">COST:</p>
            <h3 align="center" class="event-price">{{ $event->cost }}</h3>
            @if($can_register)
                <form align="center" action="/event/{{ $event->id }}/register" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success">Register for this event</button>
                </form>
            @else
                <center><font size="4"> <i class="fa fa-check-circle"></i> You have registered</font></center>
            @endif
            <br>
            <blockquote class="blockquote-reverse">
                <h5>Event Heads</h5>
                <p>{{ $event->eventhead }}</p>
            </blockquote>
        </div>
    </div>
</div>

@stop