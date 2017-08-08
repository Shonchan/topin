@extends('layouts.layout')

@section('title')
    {{ $post->name }}
@stop

@section('content')
    <div class="jumbotron">
        <div class="blog-header">
            <h1 class="blog-title">{{$post->name}}</h1>
            <p class="lead blog-description">{{$post->annotation}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            {!! $post->body !!}

        </div>
    </div>

    {!! $post->roundLinks() !!}



@endsection



