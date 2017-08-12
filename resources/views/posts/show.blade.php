@extends('layouts.layout')

@section('title')
    {{ $post->name }}
@stop

@section('content')
    <div class="mid single_blog">
        <div class="left">
            <div class="blog_item_top">
                <h1>{{ $post->name }}</h1>
                <div class="about_blog">
                    <p>{{ $post->getAuthor->name }}</p>
                   <p> @if ($post->category->parent){{ $post->category->parent->name }} <span class="dot"></span>@endif <a href="{{ url('/'.$post->category->url) }}">{{ $post->category->name }}</a></p>
                    <p><i class="icon-eye-1"></i>{{ $post->browsed }} <i class="icon-comment"></i>11</p>
                </div>
                <a href="#" class="blog_image"><img src="img/blog_item.jpg" alt="" /></a>
            </div>
            <div class="blog_item_text">
                {!! $post->body !!}
            </div>
        </div>
        <div class="right">
            <a class="car" href="#">
                <img src="{{ url('images/banner.png') }}" />
            </a>
            @include('layouts.popular')


        </div>
    </div>

    {!! $post->roundLinks() !!}



@endsection



