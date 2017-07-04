@extends('layout.master')
@section('title', 'Forgot Password')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-pad-2x">
        <div class="col col-sm-12 col-lg-4 col-md-4 col-md-offset-4 col-lg-offset-4 row-pad">
            <h4>Forgot your password?</h4>
            <p>Enter your email address to reset your password. You may need to check your spam folder or unblock no-reply@aviato.tk</p>
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
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="john@doe.com">
                    @if($errors->has('email'))<span class="help-block error">{{ $errors->first('email') }}</span>@endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn pull-right btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop