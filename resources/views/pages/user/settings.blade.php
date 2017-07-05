@extends('layout.master')
@section('title', 'My Settings')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">My Settings</h4>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">Profile Information</a></li>
                <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Update Profile</a></li>
                <li class=""><a href="#password" data-toggle="tab" aria-expanded="false">Change Password</a></li>
            </ul>
            <br>
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
        </div>
        <div id="myTabContent" class="tab-content">
            <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 tab-pane fade active in" id="info">
                <div class="form-group">
                    <label for="name" class="control-label">Full Name</label>
                    <input type="text" class="form-control" id="name" value="{{ Session::get('session')->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email" class="control-label">Email Address</label>
                    <input type="text" class="form-control" id="email" value="{{ Session::get('session')->email }}" disabled>
                </div>
                <br>
            </div>
            <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 tab-pane fade" id="profile">
                <form action="/user/settings/general" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="prn" class="control-label">PRN</label>
                        <input type="text" class="form-control" id="prn" name="prn" placeholder="PRN" value="{{ Session::get('session')->prn }}" @if(!empty(Session::get('session')->prn)) disabled @endif>
                        @if($errors->has('prn'))<span class="help-block error">{{ $errors->first('prn') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="branch" name="branch" @if(!empty(Session::get('session')->branch)) disabled @endif>
                            <option value="">Choose Branch</option>
                            <option value="CE" @if(Session::get('session')->branch == 'CE') selected @endif>CE</option>
                            <option value="IT" @if(Session::get('session')->branch == 'IT') selected @endif>IT</option>
                            <option value="PPT" @if(Session::get('session')->branch == 'PPT') selected @endif>PPT</option>
                            <option value="ME" @if(Session::get('session')->branch == 'ME') selected @endif>ME</option>
                            <option value="EXTC" @if(Session::get('session')->branch == 'EXTC') selected @endif>EXTC</option>
                        </select>
                        @if($errors->has('branch'))<span class="help-block error">{{ $errors->first('branch') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="year" name="year" @if(!empty(Session::get('session')->year)) disabled @endif>
                            <option value="">Choose Year</option>
                            <option value="FE" @if(Session::get('session')->branch == 'FE') selected @endif>FE</option>
                            <option value="SE" @if(Session::get('session')->branch == 'SE') selected @endif>SE</option>
                            <option value="TE" @if(Session::get('session')->branch == 'TE') selected @endif>TE</option>
                            <option value="BE" @if(Session::get('session')->branch == 'BE') selected @endif>BE</option>
                        </select>
                        @if($errors->has('year'))<span class="help-block error">{{ $errors->first('year') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn pull-right btn-primary">Submit</button>
                    </div>
                </form>
                <br>
            </div>
            <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 tab-pane fade" id="password">
                <form action="/user/settings/security" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="old_password" class="control-label">Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                        @if($errors->has('old_password'))<span class="help-block error">{{ $errors->first('old_password') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="new_password" class="control-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                        @if($errors->has('new_password'))<span class="help-block error">{{ $errors->first('new_password') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn pull-right btn-primary">Submit</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

@stop