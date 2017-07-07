@extends('layout.master')
@section('title', 'Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-pad">
        <div class="col col-xs-12 col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1">
            <h4>{{ $event->name }}</h4>
            <p>{{ $event->description }}</p>
            <hr>
            <h4>Entries</h4>
            <div class="list-group">
                @foreach($entries as $entry)
                    <a href="#" class="list-group-item">
                        <h5 class="list-group-item-heading">{{ $entry->name }}</h5>
                        <p class="list-group-item-text"><b>Branch:</b> {{$entry->branch }} &nbsp; <b>Year:</b> {{ $entry->year }}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col col-xs-12 col-lg-3 col-md-3">
            <p align="center">
                <a href="/admin/event/update/{{ $event->id }}" class="btn btn-primary"> UPDATE EVENT</a>
                @if(Session::has('session') && (Session::get('session')->role == 'admin' || Session::get('session')->role == 'eventhead'))
                    <a href="/event/{{ $event->id }}/message" class="btn btn-primary"> SEND MESSAGE</a>
                @endif
            </p>
            <p align="center">AMOUNT:</p>
            <h3 align="center" class="event-price">{{ $event->cost }}</h3>
            <br>
            <p align="center">TOTAL COLLECTED:</p>
            <h3 align="center" class="event-price">15000</h3>
            <br>
            <br>
            <blockquote class="blockquote-reverse">
                <h5>Event Heads</h5>
                <p>{{ $event->eventhead }}</p>
            </blockquote>
        </div>
    </div>
</div>

@stop