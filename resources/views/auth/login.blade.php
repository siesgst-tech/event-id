@extends('layout.master')
@section('title', 'Login')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad-2x">
        <div class="col col-sm-12 col-lg-12 col-md-12 row-pad">
            <div class="col col-sm-12 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-2">
                <img src="https://instagram.fbom10-1.fna.fbcdn.net/t51.2885-15/e35/15276762_259538624460922_5449602273514618880_n.jpg" width="100%">
            </div>
            <div class="col col-sm-12 col-md-5 col-lg-4">
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
                <h5>Login</h5>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" value="{{ old('email') }}" placeholder="john@doe.com">
                        @if($errors->has('email'))<span class="help-block error">{{ $errors->first('email') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                        @if($errors->has('password'))<span class="help-block error">{{ $errors->first('password') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <a href="/auth/forgot" class="pull-left">Forgot Password</a>
                        <button type="submit" class="btn pull-right btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop