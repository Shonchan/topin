@extends('layouts.layout')

@section('title')
    {{ $cat->name }}
@stop

@section('content')
    <div class="jumbotron">
        <div class="blog-header">
            <h1 class="blog-title">{{$cat->name}}</h1>
            <p class="lead blog-description">{{$cat->description}}</p>
        </div>
    </div>
    @if ($cat->getChilds)
        <div class="row">
            <div class="col-md-9">
                @foreach($cat->getChilds as $child)
                    <div class="col-md-3">
                        <a href="{{ route('category', ['url' => $child->url]) }}">{{ $child->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>

    @endif

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



