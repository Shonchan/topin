@extends('admin.index')

@section('title')
    Новая статья
@stop

@section('content')




      {!! Form::open(['route' => 'posts.store', 'method' => 'post', 'files' => true]) !!}
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="row">
                    <div class="col-md-2">
                        {!! Form::label('name', 'Заголовок', ['class' => 'control-label']) !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                  <div class="col-md-3">
                      <label>
                          {!! Form::checkbox('published', '1', old('published'),  ['id' => 'published']) !!}
                          Опубликовано
                      </label>
                  </div>
             </div>
          </div>

          <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('url', 'Адрес', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::text('url', old('url'), ['class' => 'form-control']) !!}
                      @if ($errors->has('url'))
                          <span class="help-block">
                                            <strong>{{ $errors->first('url') }}</strong>
                                </span>
                      @endif
                  </div>
              </div>
          </div>

          <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('category_id', 'Рубрика', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::select('category_id', $select , old('category_id') , ['class' => 'form-control']) !!}
                      @if ($errors->has('category_id'))
                          <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                      @endif
                  </div>
             </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('meta_title', 'Meta title', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::text('meta_title', old('meta_title'), ['class' => 'form-control']) !!}
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('meta_keywords', 'Meta keywords', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::text('meta_keywords', old('meta_keywords'), ['class' => 'form-control']) !!}
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('meta_description', 'Meta description', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::text('meta_description', old('meta_description'), ['class' => 'form-control']) !!}
                  </div>
              </div>
          </div>

          <div class="form-group {{ $errors->has('annotation') ? ' has-error' : '' }}">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('annotation', 'Аннотация', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::textarea('annotation', old('annotation'), ['class' => 'form-control']) !!}
                      @if ($errors->has('annotation'))
                          <span class="help-block">
                                            <strong>{{ $errors->first('annotation') }}</strong>
                                </span>
                      @endif
                  </div>
              </div>
          </div>

          <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('body', 'Тест статьи', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'id' => 'summernote']) !!}
                      @if ($errors->has('body'))
                          <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                </span>
                      @endif
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('image', 'Титульное изображение', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                      {!! Form::file('image', ['class' => 'form-control']) !!}
                  </div>
                  <div class="col-md-3">
                      {!! Form::submit('Сохранить', ['class' => 'form-control btn-success']) !!}
                  </div>
              </div>
          </div>
          
      {!! Form::close() !!}

@stop
