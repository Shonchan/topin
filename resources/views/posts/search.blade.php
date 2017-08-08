@extends('layouts.layout')

@section('title')
    Поиск по {{ $keyword }}
@stop

@section('content')
    <div class="jumbotron">
        <div class="blog-header">
            <h1 class="blog-title"> Поиск по {{ $keyword }}</h1>

        </div>
    </div>


    @if (count($posts)>0)

        <div class="row">
            <div class="col-md-9">
                @foreach ($posts as $post)
                    <div class="row">

                        <div class="col-md-3">
                            <img src="{{ url('files/images/'.$post->image) }}" alt="{{ $post->name }}" width="200" height="100">
                        </div>
                        <div class="col-md-9">
                            <a href="@if ($post->category->parent)
                            {{ url($post->category->parent->url.'/'.$post->url) }}
                            @else
                            {{ url($post->category->url.'/'.$post->url) }}
                            @endif"><h4>{{ $post->name }}</h4></a>
                            <p>
                                {{ $post->annotation }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        {{ $posts->links() }}


    @endif


@endsection



