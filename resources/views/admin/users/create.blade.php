@extends('admin.index')

@section('title')
    Новый пользователь
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Новый пользователь</h2>
        </div>
    </div>


      {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="row">
                    <div class="col-md-2">
                        {!! Form::label('name', 'Имя пользователя', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
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
                      {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
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
                                                'user'=>'Гость'] , null , ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-md-3">
                      {!! Form::submit('Сохранить', ['class' => 'form-control btn-success']) !!}
                  </div>
              </div>
          </div>
          
      {!! Form::close() !!}

@stop
