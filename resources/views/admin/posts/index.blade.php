@extends('admin.index')

@section('title')
    Сипсок всех статей
@stop

@section('content')
    <div class="row align-bottom">
        <div class="col-md-10">
            <h2>Список статей</h2>
        </div>
        <div class="col-md-2" style="height:20px;"></div>
        <div class="col-md-2">
            <a href="{{ url('admin/posts/create') }}" class="btn btn-primary mt-2">Добавить статью</a>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">

            @if (count($posts)>0)
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Наименование</th>
                        {{--<th>Автор</th>--}}
                        <th>Дата создания</th>
                        {{--<th>Последний редактор</th>--}}
                        <th>Дата редактирования</th>
                        <th class="col-md-1">Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                <a href="{{ route('posts.edit', ['id'=>$post->id]) }}">{{$post->name}}</a>
                            </td>
                            {{--<td>--}}
                                {{--{{ $post->author }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $post->created_at }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $post->editor }}--}}
                            {{--</td>--}}
                            <td>
                                {{ $post->updated_at }}
                            </td>
                            <td>
                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('X', ['class' => 'form-control btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
            </table>
                {{ $posts->links() }}
            @else
                <div class="alert alert-info">
                    <strong>Пока нет ни одной статьи</strong>
                </div>
            @endif
        </div>
    </div>
@stop