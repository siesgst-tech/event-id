@extends('layout.master')
@section('title', 'Add Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
            <h4 align="center">Add Event</h4>
            <form action="" method="GET">
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="about" class="control-label">About</label>
                    <textarea class="form-control" rows="3" id="about" placeholder="Describe this event..."></textarea>
                </div>
                <div class="form-group">
                    <label for="rules" class="control-label">Rules</label>
                    <textarea class="form-control" rows="3" id="rules" placeholder="Rules of this event..."></textarea>
                </div>
                <div class="form-group">
                    <label for="gameplay" class="control-label">Gameplay</label>
                    <textarea class="form-control" rows="3" id="gameplay" placeholder="How to play this event..."></textarea>
                </div>
                <div class="form-group">
                    <label for="event_head" class="control-label">Event Head(s)</label>
                    <textarea class="form-control" rows="3" id="event_head" placeholder="Event Heads and their contact"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary">ADD EVENT</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop