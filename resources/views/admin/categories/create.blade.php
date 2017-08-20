@extends('admin.index')

@section('title')
    Новая рубрика
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Новая рубрика</h2>
        </div>
    </div>


      {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
          <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="row">
                    <div class="col-md-2">
                        {!! Form::label('name', 'Наименование', ['class' => 'control-label']) !!}
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

          <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('url', 'Url', ['class' => 'control-label']) !!}
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





          <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
              <div class="row">
                  <div class="col-md-2">
                      {!! Form::label('parent_id', 'Родительская рубрика', ['class' => 'control-label']) !!}
                  </div>
                  <div class="col-md-7">
                     {!! Form::select('parent_id', $select , old('parent_id') , ['class' => 'form-control']) !!}
                      @if ($errors->has('url'))
                          <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
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

    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('description', 'Описание', ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-7">
                {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'id' => 'summernote']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::submit('Сохранить', ['class' => 'form-control btn-success']) !!}
            </div>
        </div>
    </div>

    <script !src="">var resource='category';</script>
          
    {!! Form::close() !!}

@stop
