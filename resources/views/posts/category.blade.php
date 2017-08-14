@extends('layouts.layout')

@section('title')
    {{ $cat->name }}
@stop

@section('content')

    <div class="mid blog">
        <div class="left">
            @if(count($posts) > 0)
                <div class="blog_top">

                        @for ($i = 0; $i < 3; $i++)
                            @if(isset($posts[$i]))
                                <a class="item @if ($i == 0)item_big @endif"
                                   @if($posts[$i]->image)style="background-image: url({{ url('files/images/'.$posts[$i]->image) }})" @endif
                                    href="@if ($posts[$i]->category->parent)
                                            {{ url($posts[$i]->category->parent->url.'/'.$posts[$i]->url) }}
                                      @else
                                            {{ url($posts[$i]->category->url.'/'.$posts[$i]->url) }}
                                      @endif">
                                    <div class="bot">
                                        <span class="h2">{{ $posts[$i]->name }}</span>
                                    </div>
                                </a>
                            @endif
                        @endfor


                </div>
                @if (count($posts) > 3)
                    @if(isset($posts[$i]))
                        @for ($i = 3; $i < count($posts); $i++)

                            @include('posts.postBlock', ['post' => $posts[$i]])

                        @endfor

                        {{ $posts->links() }}
                    @endif
                @endif

            @endif
        </div>

        <div class="right">
            <a class="car" href="#">
                <img src="{{ url('images/banner.png') }}" />
            </a>
            @include('layouts.popular')
            <div id="sidebar">
                <img src="{{ url('images/banner.png') }}" style="height:300px;width:100%;" />
            </div>

        </div>
    </div>

@endsection



