@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" style="line-height: 100px;">
                        <div class="col-md-3">
                            <div style="width: 100px; height: 100px;">
                                <img src="" alt="Image">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <a href="{!! route('game') !!}">Game</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        img:before {
            content: ' ';
            display: block;
            position: absolute;
            height: 100px;
            width: 100px;
            background-size: 100px;
            background-image: url({!! asset('images/no_image_available.jpeg') !!});
    </style>
@endsection
