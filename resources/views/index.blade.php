@extends('layouts.layout')



@section('content')

            <div class="top">
                @if(isset($latest_posts) && count($latest_posts)>0)
                    @foreach($latest_posts as $lp)
                        <a class="item @if ($loop->first)
                                        item_big
                                        @endif"
                           @if($lp->image)style="background-image: url({{ url('files/images/'.$lp->image) }})"@endif href="@if ($lp->category->parent)
                        {{ url($lp->category->parent->url.'/'.$lp->url) }}
                        @else
                        {{ url($lp->category->url.'/'.$lp->url) }}
                        @endif">
                            <div class="bot">
                                <span class="h2">{{ $lp->name }}</span>
                            </div>
                        </a>
                    @endforeach
                @endif


            </div>
            <div class="mid">
                <div class="left">
                    @if(isset($posts) && count($posts)>0)
                        @foreach ($posts as $post)
                            @include('posts.postBlock')
                        @endforeach
                    @endif


                </div>
                <div class="right">
                    @include('layouts.popular')
                </div>
            </div>


@endsection