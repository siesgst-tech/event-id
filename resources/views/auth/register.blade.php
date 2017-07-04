@extends('layout.master')
@section('title', 'Register')
@section('content')

<div class="container-fluid">
    <div class="row row-pad">
        <div class="col col-sm-12 col-lg-12 col-md-12 light-bg">
            <div class="col col-sm-12 col-md-6 col-lg-4 col-md-offset-1 col-lg-offset-2">
                <h1>Event ID</h1>
                <p class="lead">Making event management simpler, faster and paperless.</p>
            </div>
            <div class="col col-sm-12 col-md-4 col-lg-offset-1 col-lg-3">
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
                        <label class="control-label" for="name">Full Name</label>
                        <input class="form-control validate" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Jon Doe">
                        @if($errors->has('name'))<span class="help-block error">{{ $errors->first('name') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="john@doe.com">
                        @if($errors->has('email'))<span class="help-block error">{{ $errors->first('email') }}</span>@endif
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                        @if($errors->has('password'))<span class="help-block error">{{ $errors->first('password') }}</span>@endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Sign up for free</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row row-pad">
        <div class="col col-sm-12 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-2 img-land">
            <img src="https://instagram.fbom10-1.fna.fbcdn.net/t51.2885-15/e35/15276762_259538624460922_5449602273514618880_n.jpg">
        </div>
        <div class="col col-sm-12 col-md-5 col-lg-4 p-pad">
            <h5>Take your online credits</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
    <div class="row row-pad">
        <div class="col col-sm-12 col-md-5 col-lg-4 col-md-offset-1 col-lg-offset-2 p-pad">
            <h5>More power and controls to the user</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="col col-sm-12 col-md-5 col-lg-4 img-land">
            <img src="https://instagram.fbom10-1.fna.fbcdn.net/t51.2885-15/e35/15253357_1243944665652360_2507941265102864384_n.jpg">
        </div>
    </div>
</div>

@stop