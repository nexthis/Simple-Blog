@extends('layout.layout')
@section('title',$post->title)

@section('content')
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-md-6">
                    <img src='/storage/{{$post->image}}' class="img-fluid"/>
            </div>
            <div class="col-md-6">
                <h1 class="display-4 text-center">{{$post->title}}</h1>
                {!!$post->body!!}
            </div>
        </div>
    </div>
    <comments page="{{$post->id}}"></comments>
@endsection