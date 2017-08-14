@if (isset($links))
    @foreach($links as $link)
        <div class="item">
            <a href="@if ($link->category->parent)
            {{ url($link->category->parent->url.'/'.$link->url) }}
            @else
            {{ url($link->category->url.'/'.$link->url) }}
            @endif">{{ $link->name }}</a>
        </div>
    @endforeach
@endif

