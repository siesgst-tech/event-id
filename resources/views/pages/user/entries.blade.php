@extends('layout.master')
@section('title', 'My Entries')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-up row-pad">
        <h4 align="center">My Entries</h4>
        <br>
        <div class="col col-xs-12 col-sm-10 col-sm-offset-1 col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4">
            <div class="list-group">
                @foreach($entries as $entry)
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $entry->name }}</h4>
                        <span><b>Amount:</b> {{ $entry->cost }}</span>
                    </a>
                @endforeach
            </div>
            <center>
                {{ $entries->links() }}
            </center>
        </div>
    </div>
</div>

@stop