@extends('admin.index')

@section('title')
    Сипсок всех рубрик
@stop

@section('content')
    @include('admin.parts.message')
    <div class="row">
        <div class="col-md-10">
            <h2>Список рубрик</h2>
        </div>
        <div class="col-md-2" style="height:20px;"></div>
        <div class="col-md-2">
            <a href="{{ route('categories.create') }}" class="btn btn-primary mt-2">Добавить рубрику</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if (count($cats)>0)
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Наименование</th>
                        {{--<th>Автор</th>--}}
                        <th>Родительская категория</th>
                        {{--<th>Последний редактор</th>--}}
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cats as $cat)
                            <tr>
                                <td>
                                    {{ $cat->id }}
                                </td>

                                <td>
                                    <a href="{{ route('categories.edit', ['id'=>$cat->id]) }}">{{$cat->name}}</a>
                                </td>

                                <td>
                                    Корневая рубрика
                                </td>

                                {{--<td>--}}
                                    {{--{{ $user->role }}--}}
                                {{--</td>--}}
                                <td class="col-md-1">
                                    {!! Form::open(['route' => ['categories.destroy', $cat->id], 'method' => 'delete']) !!}
                                    	{!! Form::submit('X', ['class' => 'form-control btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @if (count($cat->childs) > 0)
                                @foreach ($cat->childs as $child)


                                    <tr>
                                        <td>
                                            {{ $child->id }}
                                        </td>

                                        <td>
                                            <a href="{{ route('categories.edit', ['id'=>$child->id]) }}"> -- {{$child->name}}</a>
                                        </td>

                                        <td>
                                            {{ $child->parent->name }}
                                        </td>

                                        {{--<td>--}}
                                        {{--{{ $user->role }}--}}
                                        {{--</td>--}}
                                        <td class="col-md-1">
                                            {!! Form::open(['route' => ['categories.destroy', $child->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('X', ['class' => 'form-control btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>

            @else
                <div class="alert alert-info">
                    <strong>Пока нет ни одной рубрики</strong>
                </div>

            @endif

        </div>
    </div>
@stop