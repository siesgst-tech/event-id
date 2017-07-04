@extends('layout.master')
@section('title', 'Reset Password')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-pad-2x">
        <div class="col col-sm-12 col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4 row-pad">
            <h4>Reset password</h4>
            <p>Enter the reset code you received in your email</p>
            @if(Session::has('error'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! Session::get('error') !!}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {!! Session::get('success') !!}
                </div>
            @endif
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="new_password">New Password</label>
                    <input class="form-control" id="new_password" name="new_password" type="password" placeholder="New Password">
                    @if($errors->has('new_password'))<span class="help-block error">{{ $errors->first('new_password') }}</span>@endif
                </div>
                <div class="form-group">
                    <button class="btn pull-right btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop