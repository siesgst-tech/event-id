@extends('layout.master')
@section('title', 'Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <div class="col col-xs-12 col-lg-7 col-lg-offset-1 col-md-7 col-md-offset-1">
            <h4>Event Name</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <blockquote>
                <h5>About</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <blockquote>
                <h5>Rules</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
            <blockquote>
                <h5>Gameplay</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            </blockquote>
        </div>
        <div class="col col-xs-12 col-lg-3 col-md-3">
            <p align="center">AMOUNT:</p>
            <h3 align="center" class="event-price">500</h3>
            <form align="center">
                <button class="btn btn-success">Register for this event</button>
            </form>
            <br>
            <br>
            <blockquote class="blockquote-reverse">
                <h5>Event Heads</h5>
                <p>XYXU JKBKB  - +91 12234 93933<br>    XYXU JKBKB  - +91 12234 93933</p>
            </blockquote>
        </div>
    </div>
</div>

@stop