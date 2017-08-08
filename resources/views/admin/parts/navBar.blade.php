<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
               TOPin

            </a>

        </div>

        <span class="logout-spn" >
                {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                	{!! Form::submit('LOGOUT', ['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}


        </span>
    </div>
</div>