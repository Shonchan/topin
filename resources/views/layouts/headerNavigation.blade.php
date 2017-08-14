<header>
    <div class="content">
        <div class="top">
            <div class="logo">
                <div class="mobile_menu">
                    <a href="#" class="mobile_button"><span></span></a>
                    <ul>

                        
                        @if (isset($cats) && count($cats)>0)
                            @foreach ($cats as $cat)
                                <li><a href="{{ url($cat->url) }}">{{ $cat->name }}</a></li>
                                @if (count($cat->childs) > 0)
                                    @foreach ($cat->childs as $child)
                                        <li><a href="{{ url($child->url) }}">{{ $child->name }}</a></li>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif


                    </ul>
                </div>
                <a href=" {{ url('/') }}"><img src="{{ url('images/logo.png') }}" alt="" /></a>
                <div class="menu">

                    <ul>

                         @if (isset($cats) && count($cats)>0)
                            @foreach ($cats as $cat)
                                <li><a href="{{ url($cat->url) }}">{{ $cat->name }}</a></li>
                                @if (count($cat->childs) > 0)
                                    @foreach ($cat->childs as $child)
                                        <li><a href="{{ url($child->url) }}">{{ $child->name }}</a></li>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif

                    </ul>
                </div>
            </div>
            <div class="search icon-search">
                {!! Form::open(['route' => 'search.redirect', 'method' => 'post']) !!}
                    {!! Form::text('search', null, ['placeholder' => 'Как выбрать..']) !!}
                {!! Form::close() !!}
            </div>
            <!--div class="login">
                <a href="#" class="icon-user"></a>
            </div-->
        </div>
        <div class="search_items">

        </div>
    </div>
</header>



