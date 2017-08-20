@extends('admin.index')

@section('title')
    {{ $cat->name }}
@stop

@section('content')

    @include('admin.parts.message')
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $cat->name }}</h2>
        </div>
    </div>


    {!! Form::model($cat, ['route' => ['categories.update', $cat->id], 'method' => 'put']) !!}


    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('name', 'Наименование', ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('name', $cat->name, ['class' => 'form-control', 'data-name'=>$cat->name]) !!}
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
                {!! Form::text('url', $cat->url, ['class' => 'form-control', 'data-url'=>$cat->url]) !!}
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
                {!! Form::select('parent_id', $select , $cat->parent_id , ['class' => 'form-control']) !!}
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
                {!! Form::text('meta_title', $cat->meta_title, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('meta_keywords', 'Meta keywords', ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('meta_keywords', $cat->meta_keywords, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('meta_description', 'Meta description', ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-7">
                {!! Form::text('meta_description', $cat->meta_description, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('description', 'Описание', ['class' => 'control-label']) !!}
            </div>
            <div class="col-md-7">
                {!! Form::textarea('description', $cat->description, ['class' => 'form-control', 'id' => 'summernote']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::submit('Сохранить', ['class' => 'form-control btn-success']) !!}
            </div>
        </div>
    </div>

    <script !src="">var resource='category';</script>

    {!! Form::close() !!}

@stop
