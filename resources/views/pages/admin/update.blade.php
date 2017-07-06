@extends('layout.master')
@section('title', 'Update Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
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
            <h4 align="center">Update Event</h4>
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $event->name }}">
                    @if($errors->has('name'))<span class="help-block error">{{ $errors->first('name') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea class="form-control" rows="3" name="description" id="description" >{{ $event->description }}</textarea>
                    @if($errors->has('description'))<span class="help-block error">{{ $errors->first('description') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">About</label>
                    <textarea class="form-control" rows="3" name="about" id="about" >{{ $event->about }}</textarea>
                    @if($errors->has('about'))<span class="help-block error">{{ $errors->first('about') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="rules" class="control-label">Rules</label>
                    <textarea class="form-control" rows="3" name="rules" id="rules">{{ $event->rules }}</textarea>
                    @if($errors->has('rules'))<span class="help-block error">{{ $errors->first('rules') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="gameplay" class="control-label">Gameplay</label>
                    <textarea class="form-control" rows="3" name="gameplay" id="gameplay">{{ $event->gameplay }}</textarea>
                    @if($errors->has('gameplay'))<span class="help-block error">{{ $errors->first('gameplay') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="eventhead" class="control-label">Event Head(s)</label>
                    <textarea class="form-control" rows="3" name="eventhead" id="eventhead">{{ $event->eventhead }}</textarea>
                    @if($errors->has('eventhead'))<span class="help-block error">{{ $errors->first('eventhead') }}</span>@endif
                </div>
                <div class="form-group">
                    <label for="cost" class="control-label">Cost</label>
                    <input type="number" class="form-control" name="cost" id="cost" value="{{ $event->cost }}">
                    @if($errors->has('cost'))<span class="help-block error">{{ $errors->first('cost') }}</span>@endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">UPDATE EVENT</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop