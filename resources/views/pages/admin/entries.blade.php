@extends('layout.master')
@section('title', 'Admin Home')
@section('content')

<div class="container-fluid pull-down">
    <div class="row row-pad">
        <div class="col col-xs-12 col-lg-6 col-md-6">
            <h4 align="center">All Entries</h4>
            <br>
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