@extends('layout.master')
@section('title', 'Home')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <div class="col col-xs-12 col-lg-6 col-md-6">
            <h4 align="center">Events</h4>
            <div class="list-group">
                @foreach($events as $event)
                    <span class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $event->name }}</h4>
                        <p class="list-group-item-text">
                            {{ $event->about }}
                        </p>
                        <span><b>Amount:</b> {{ $event->cost }}</span>
                        <a href="/event/{{ $event->id }}" class="btn btn-sm btn-primary pull-right"> VIEW MORE</a>
                    </span>
                @endforeach
            </div>
            <center>
                {{ $events->links() }}
            </center>
        </div>
        <div class="col col-xs-12 col-lg-6 col-md-6">
            <h4 align="center">Messges</h4>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h5 class="list-group-item-heading">Message Title</h5>
                    <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                    <span class="pull-left"><b>Event:</b> Laser Tag</span>
                    <span class="pull-right"><b>Time:</b> 28 Jan 2016 12:30 PM</span>
                    <br>
                </a>
                <a href="#" class="list-group-item">
                    <h5 class="list-group-item-heading">Message Title</h5>
                    <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                    <span class="pull-left"><b>Event:</b> Laser Tag</span>
                    <span class="pull-right"><b>Time:</b> 28 Jan 2016 12:30 PM</span>
                    <br>
                </a>
                <br>
                <a href="/user/messages" class="pull-right btn btn-primary">VIEW ALL</a>
            </div>
        </div>
    </div>
</div>

@stop