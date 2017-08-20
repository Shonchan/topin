<div class="popular">
    @if (isset($popular) && count($popular) > 0)
    <div class="h2"><span class="icon-fire">Самое интересное</span></div>


        @foreach ($popular as $pp)
            <div class="item">
                <a href="@if ($pp->category->parent)
                {{ url($pp->category->parent->url.'/'.$pp->url) }}
                @else
                {{ url($pp->category->url.'/'.$pp->url) }}
                @endif">{{ $pp->name }}</a>
                <p>{{ $pp->browsed }} {{ trans_choice('просмотр|просмотра|просмотров', $pp->browsed) }} {{--<span></span> 2 ответа--}}</p>
            </div>
        @endforeach
    @endif


</div>