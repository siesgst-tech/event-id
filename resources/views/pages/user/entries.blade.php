@extends('layout.master')
@section('title', 'My Entries')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">My Entries</h4>
        <br>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Event Name</h4>
                    <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                    <span><b>Amount:</b> 500</span>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Event Name</h4>
                    <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                    <span><b>Amount:</b> 500</span>
                </a>
            </div>
            <center>
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </center>
        </div>
    </div>
</div>

@stop