@extends('admin.index')

@section('title')
    {{ $user->name }}
@stop

@section('content')

    @include('admin.parts.message')

   <div class="row">
       <div class="col-md-12">
           <h2>{{$user->name}}</h2>
       </div>
   </div>
   <hr>
    <div class="row">
        <div class="col-md-2">
            Дата создания:
        </div>
        <div class="col-md-4">
            {{ $user->created_at }}
        </div>
        <div class="col-md-2">
            Дата редактирования:
        </div>
        <div class="col-md-4">
            {{ $user->updated_at }}
        </div>
    </div>
    

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}


        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('name', 'Имя пользователя', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-7">
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                </span>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-7">
                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'disabled' => 'true']) !!}
                    @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('password', 'Пароль', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-7">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @if ($errors->has('password'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('role', 'Роль', ['class' => 'control-label']) !!}
                </div>
                <div class="col-md-7">
                    {!! Form::select('role', [ 'admin'=>'Администратор',
                                               'author'=>'Автор',
                                               'editor'=>'Редактор',
                                               'user'=>'Гость'] , $user->role , ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::submit('Сохранить', ['class' => 'form-control btn-success']) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@stop