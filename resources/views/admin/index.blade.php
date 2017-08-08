<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админ панель')</title>
    <link rel="stylesheet" href="{{mix('css/admin.css')}}">
</head>
<body>
<div id="wrapper">
    @include('admin.parts.navBar')
    <!-- /. NAV TOP  -->
    @include('admin.parts.sideBar')
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">

                @yield('content')

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">


        <div class="row">
            <div class="col-lg-12" >
                &copy;  2017 topin.ru | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/admin.js') }}"></script>
</body>
</html>