@extends('layout.layout')
@section('title','Przygoda')
@section('head')
    <link rel="stylesheet" href="{{mix('css/adventure.css')}}">
@endsection
@section('content')
    <div class="container my-5">
            <div class="card-deck">
            @foreach ($adventure as $item)
                    <div class="card my-card" >
                        <img class="card-img-top" src="/storage/{{$item->image}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <p class="card-text mb-5">{{$item->short}}</p>
                            <a href="{{route('adventure.show',$item->slug)}}" class="btn btn-primary">Wyruszamy</a>
                        </div>
                    </div>
                @if ($loop->iteration % 3 == 0 || $loop->iteration ==0 )
                </div>
                <div class="card-deck mt-3">
                @endif
            @endforeach
        
    </div>
@endsection