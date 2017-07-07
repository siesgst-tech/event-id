@extends('layout.master')
@section('title', 'Messages')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">My Messages</h4>
        <br>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
            @foreach($messages as $message)
                <span href="#" class="list-group-item">
                    <h5 class="list-group-item-heading">{{ $message->title }}</h5>
                    <p class="list-group-item-text">{{ $message->message }}</p>
                    <span class="pull-left"><b>Event:</b> {{ $message->name }}</span>
                    <span class="pull-right"><b>Time:</b> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->updated_at))->diffForHumans() }}</span>
                    <br>
                </span>
            @endforeach
            <center>
                {{ $messages->links() }}
            </center>
        </div>
    </div>
</div>

@stop