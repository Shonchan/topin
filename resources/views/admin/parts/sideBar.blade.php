<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">



            <li @if (Request::segment(2) == '') class="active-link" @endif >
                <a href="{{url('admin')}}" ><i class="fa fa-desktop "></i>Главная панель</a>
            </li>


            <li  @if (Request::segment(2) == 'posts') class="active-link" @endif >
                <a href="{{url('admin/posts')}}"><i class="fa fa-table "></i>Статьи</a>
            </li>
            <li  @if (Request::segment(2) == 'users') class="active-link" @endif >
                <a href="{{url('admin/users')}}"><i class="fa fa-table "></i>Пользователи</a>
            </li>

            <li  @if (Request::segment(2) == 'categories') class="active-link" @endif >
            <a href="{{url('admin/categories')}}"><i class="fa fa-table "></i>Рубрики</a>
            </li>


        </ul>
    </div>

</nav>