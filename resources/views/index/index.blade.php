@extends('layout.layout')
@section('title','Blog')

@section('head')
    <link rel="stylesheet" href="{{mix('css/adventure.css')}}">
@endsection

@section('content')
    <div class="img-text">
        <img src='{{asset('assets/images/picsum.jpg')}}' class="img-fluid"/>
        <div class="centered">
            <h1 class="display-2">Witaj Podróżniku</h1>
            <h1>Szukasz przygód ??</h1>
            <h3>Świetnie trafiłeś !! </h3>
        </div>
    </div>
    <div class="container mb-5 marketing">
        @for ($i = 0; $i < count($posts); $i++)
            <hr class="featurette-divider">
            <div class="row featurette">
                    @if ($i%2)
                        <div class="col-md-7">
                            <a href="{{route('index.show',$posts[$i]->slug)}}"> <h2 class="featurette-heading">{{$posts[$i]->title}}</h2></a>
                            <p class="lead">{{ strip_tags($posts[$i]->body)}}</p>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-fluid mx-auto" src='/storage/{{$posts[$i]->image}}' data-holder-rendered="true">
                        </div>
                    @else
                        <div class="col-md-7 order-md-2">
                          <a href="{{route('index.show',$posts[$i]->slug)}}"><h2 class="featurette-heading">{{$posts[$i]->title}}</h2></a>
                            <p class="lead">{{ strip_tags($posts[$i]->body)}}</p>
                        </div>
                        <div class="col-md-5 order-md-1">
                            <img class="featurette-image img-fluid mx-auto"  src='/storage/{{$posts[$i]->image}}' data-holder-rendered="true" >
                        </div>
                    @endif
            </div>
        @endfor
    </div>
@endsection