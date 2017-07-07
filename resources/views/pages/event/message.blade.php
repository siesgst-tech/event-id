@extends('layout.master')
@section('title', 'Message Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">Message Event</h4>
        <br>
        @if(Session::has('error'))
            <div class="col col-sm-12 col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4">
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! Session::get('error') !!}
                </div>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="col col-sm-12 col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4">
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        <div class="col col-xs-12 col-sm-6 col-lg-5 col-md-5 col-lg-offset-1 col-md-offset-1">
            <br>
            <div class="list-group">
                @foreach($messages as $message)
                    <span href="#" class="list-group-item">
                        <h5 class="list-group-item-heading">{{ $message->title }}</h5>
                        <p class="list-group-item-text">{{ $message->message }}</p>
                        <span class="pull-left"><b>Event:</b> {{ $message->name }}</span>
                        <span class="pull-right"><b>Time:</b> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->updated_at))->diffForHumans() }}</span>
                        <br>
                        <form action="/event/{{ $message->id }}/message/delete" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-danger pull-right">Delete</button>
                        </form>
                        <br>
                    </span>
                @endforeach
            </div>
            <center>
                {{ $messages->links() }}
            </center>
        </div>
        <div class="col col-xs-12 col-sm-6 col-lg-5 col-md-5">
            <h5 align="center">Send a message</h5>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        @if($errors->has('title'))<span class="help-block error">{{ $errors->first('title') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="message" class="control-label">Message</label>
                        <textarea class="form-control" rows="3" name="message" id="message" placeholder="Your message..."></textarea>
                        @if($errors->has('message'))<span class="help-block error">{{ $errors->first('message') }}</span>@endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn pull-right btn-primary">SEND MESSAGE</button>
                    </div>
                </form>
        </div>
    </div>
</div>

@stop