@extends('layout.master')
@section('title', 'Reset Password')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-pad-2x">
        <div class="col col-sm-12 col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4 row-pad">
            <h4>Reset password</h4>
            <p>Enter the reset code you received in your email</p>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Oops, user with that email already exists! <a href="/auth/login" class="alert-link">Try Login</a>
            </div>
            <form>
                <div class="form-group">
                    <label class="control-label" for="code">Reset Code</label>
                    <input class="form-control" id="code" type="text" placeholder="EID-XXXX">
                </div>
                <div class="form-group">
                    <button class="btn pull-right btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop