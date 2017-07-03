@extends('layout.master')
@section('title', 'My Settings')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">My Settings</h4>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">Profile Information</a></li>
                <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Update Profile</a></li>
                <li class=""><a href="#password" data-toggle="tab" aria-expanded="false">Change Password</a></li>
            </ul>
        </div>
        <div id="myTabContent" class="tab-content">
            <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 tab-pane fade active in" id="info">
                <br>
                <div class="form-group">
                    <label for="name" class="control-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Full Name" disabled>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email Address</label>
                    <input type="text" class="form-control" id="email" placeholder="Email Address" disabled>
                </div>
                <br>
            </div>
            <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 tab-pane fade" id="profile">
                <br>
                <form >
                    <div class="form-group">
                        <label for="prn" class="control-label">PRN</label>
                        <input type="text" class="form-control" id="prn" placeholder="PRN">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="select">
                            <option>Choose Branch</option>
                            <option>CE</option>
                            <option>IT</option>
                            <option>PPT</option>
                            <option>ME</option>
                            <option>EXTC</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="select">
                            <option>Choose Year</option>
                            <option>FE</option>
                            <option>SE</option>
                            <option>TE</option>
                            <option>BE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn pull-right btn-primary">Submit</button>
                    </div>
                </form>
                <br>
            </div>
            <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 tab-pane fade" id="password">
                <br>
                <form>
                    <div class="form-group">
                        <label for="password" class="control-label">Old Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Old Password">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">New Password</label>
                        <input type="password" class="form-control" id="password" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <button class="btn pull-right btn-primary">Submit</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

@stop