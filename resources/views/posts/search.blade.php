@extends('layouts.layout')

@section('title')
    Поиск по {{ $keyword }}
@stop

@section('content')


    <div class="mid">
        <div class="left">
            @if (count($posts)>0)


                @foreach ($posts as $post)
                   @include('posts.postBlock')
                @endforeach

                {{ $posts->links() }}


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




