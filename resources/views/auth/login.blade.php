@extends('layout.master')
@section('title', 'Login')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad-2x">
        <div class="col col-sm-12 col-lg-12 col-md-12 row-pad">
            <div class="col col-sm-12 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-2">
                <img src="/assets/EVENTID.png" width="100%">
            </div>
            <div class="col col-sm-12 col-md-5 col-lg-4">
                    <div class="alert alert-dismissible alert-danger" id="error" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                
                <h5>Login</h5>
                <form method="POST" id="LoginForm" action="/auth/login">
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" type="text" value="{{ old('email') }}" placeholder="john@doe.com">
                        
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input class="form-control" id="password" type="password"  value="{{ old('password') }}" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <a href="/auth/forgot" class="pull-left">Forgot Password</a>
                        <button type="submit" class="btn pull-right btn-primary" id="login-button" disabled>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop