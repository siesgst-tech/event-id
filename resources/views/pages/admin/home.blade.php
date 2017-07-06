@extends('layout.master')
@section('title', 'Admin Home')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">Events</h4>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
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
            <div class="list-group">
                @foreach($events as $event)
                    <span class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $event->name }}</h4>
                        <p class="list-group-item-text">
                            {{ $event->about }}
                        </p>
                        <span><b>Amount:</b> {{ $event->cost }}</span>
                        <form action="/admin/event/delete/{{ $event->id }}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-sm btn-danger pull-right"> DELETE</button>
                        </form>
                        &nbsp;
                        <a href="/admin/event/{{ $event->id }}" class="btn btn-sm btn-primary pull-right"> VIEW MORE</a>
                        &nbsp;
                        <a href="/admin/event/update/{{ $event->id }}" class="btn btn-sm btn-primary pull-right"> UPDATE</a>
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