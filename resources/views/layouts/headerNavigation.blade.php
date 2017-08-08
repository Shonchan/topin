<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>--}}
            <a class="navbar-brand" href="/">TOPin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                @foreach($cats as $cat)
                    @if (count($cat->childs) > 0)
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ url($cat->url) }}">{{$cat->name}}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach ($cat->childs as  $child)
                                    <li><a href="{{ url($child->url) }}">{{$child->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url($cat->url) }}">{{$cat->name}}</a></li>
                    @endif
                @endforeach
            </ul>
            {!! Form::open(['route' => 'search.redirect', 'method' => 'post', 'class'=> 'navbar-form navbar-right']) !!}
            	{!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Поиск...']) !!}
            {!! Form::close() !!}
        </div><!--/.nav-collapse -->
    </div>
</nav>