@extends('admin.index')

@section('title')
    Сипсок всех пользователей
@stop

@section('content')
    @include('admin.parts.message')
    <div class="row">
        <div class="col-md-10">
            <h2>Список пользователей</h2>
        </div>
        <div class="col-md-2" style="height:20px;"></div>
        <div class="col-md-2">
            <a href="{{ url('admin/users/create') }}" class="btn btn-primary mt-2">Добавить пользователя</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if (count($users)>0)
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Имя пользователя</th>
                        {{--<th>Автор</th>--}}
                        <th>E-mail</th>
                        {{--<th>Последний редактор</th>--}}
                        <th>Роль</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>

                                <td>
                                    <a href="{{ route('users.edit', ['id'=>$user->id]) }}">{{$user->name}}</a>
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                    {{ $user->role }}
                                </td>
                                <td class="col-md-1">
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                    	{!! Form::submit('X', ['class' => 'form-control btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            @else
                <div class="alert alert-info">
                    <strong>Пока нет ни одного пользователя</strong>
                </div>

            @endif

        </div>
    </div>
@stop