@extends('layouts.layout')

@section('header')

    <div class="jumbotron">
        <div class="container">
            <h1>Hello, world</h1>
            <p>Bla bla bal</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
    @foreach($posts as $post)

            <div class="col-md-4">
                <h2>{{$post['name']}}</h2>
                <p>{{$post['desc']}}</p>
                <p><a href="/posts/{{$post['url']}}" class="btn btn-default">Читать далее</a></p>
            </div>

    @endforeach
    </div>

@endsection