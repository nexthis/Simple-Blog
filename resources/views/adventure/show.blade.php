@extends('layout.layout')
@section('title',$adventure->title)

@section('content')
    <div class="container mt-5">
        {!!$adventure->body!!}
    </div>

@endsection
