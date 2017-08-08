@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>ADMIN DASHBOARD</h2>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    {{--<div class="row">
        <div class="col-lg-12 ">
            <div class="alert alert-info">
                <strong>Welcome Jhon Doe ! </strong> You Have No pending Task For Today.
            </div>

        </div>
    </div>--}}
    <!-- /. ROW  -->
    <div class="row text-center pad-top">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="{{ route('categories.create') }}" >
                    <i class="fa fa-folder-o fa-5x"></i>
                    <h4>Добавить рубрику</h4>
                </a>
            </div>


        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="{{ route('posts.create') }}" >
                    <i class="fa fa-file-text-o fa-5x"></i>
                    <h4>Добавить статью</h4>
                </a>
            </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
            <div class="div-square">
                <a href="{{ route('users.create') }}" >
                    <i class="fa fa-user fa-5x"></i>
                    <h4>Добавить пользователя</h4>
                </a>
            </div>


        </div>

    </div>


    <!-- /. ROW  -->
   {{-- <div class="row">
        <div class="col-lg-12 ">
            <br/>
            <div class="alert alert-danger">
                <strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Click Here</a>.
            </div>

        </div>
    </div>--}}
@stop