@extends('layout.master')
@section('title', 'Message Event')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">Message Event</h4>
        <br>
        <div class="col col-xs-12 col-sm-6 col-lg-5 col-md-5 col-lg-offset-1 col-md-offset-1">
            <br>
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
                    <button class="btn btn-sm btn-danger pull-right">Delete</button>
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
                    <button class="btn btn-sm btn-danger pull-right">Delete</button>
                    <br>
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
        <div class="col col-xs-12 col-sm-6 col-lg-5 col-md-5">
            <h5 align="center">Send a message</h5>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="message" class="control-label">Message</label>
                        <textarea class="form-control" rows="3" id="message" placeholder="Your message..."></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <select class="form-control" id="select">
                            <option>Choose Event</option>
                            <option>Angel Pass</option>
                            <option>Laser Tag</option>
                            <option>Monopoly</option>
                            <option>Pictionary</option>
                        </select>
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