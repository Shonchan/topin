<div class="row">
    <div class="col-md-2">
        <a href="@if ($prev[1]->category->parent)
        {{ url($prev[1]->category->parent->url.'/'.$prev[1]->url) }}
        @else
        {{ url($prev[1]->category->url.'/'.$prev[1]->url) }}
        @endif">{{ $prev[1]->name }}</a>
    </div>
    <div class="col-md-2">
        <a href="@if ($prev[0]->category->parent)
        {{ url($prev[0]->category->parent->url.'/'.$prev[0]->url) }}
        @else
        {{ url($prev[0]->category->url.'/'.$prev[0]->url) }}
        @endif">{{ $prev[0]->name }}</a>
    </div>
    <div class="col-md-2 col-md-offset-4">
        <a href="@if ($next[0]->category->parent)
        {{ url($next[0]->category->parent->url.'/'.$next[0]->url) }}
        @else
        {{ url($next[0]->category->url.'/'.$next[0]->url) }}
        @endif">{{ $next[0]->name }}</a>
    </div>
    <div class="col-md-2">
        <a href="@if ($next[0]->category->parent)
        {{ url($next[0]->category->parent->url.'/'.$next[0]->url) }}
        @else
        {{ url($next[0]->category->url.'/'.$next[0]->url) }}
        @endif">{{ $next[0]->name }}</a>
    </div>
</div>