<div class="item">
    <div class="image">
        <a href="@if ($post->category->parent){{ url($post->category->parent->url.'/'.$post->url) }}@else{{ url($post->category->url.'/'.$post->url) }}@endif">
            <img @if ($post->image)data-original="{{ url('files/images/'.$post->image) }}" src="{{ url('files/images/'.$post->image) }}"@endif alt="{{ $post->name }}" />
        </a>
    </div>
    <div class="cont">
        <a href="@if ($post->category->parent)
        {{ url($post->category->parent->url.'/'.$post->url) }}
        @else
        {{ url($post->category->url.'/'.$post->url) }}
        @endif">{{ $post->name }}</a>
        <p>{{ $post->annotation }}</p>
        <p><span class="icon-clock">{{ $post->created_at }}</span> <span class="icon-eye-1"> {{ $post->browsed }}</span> {{--<span class="icon-comment">11</span>--}}</p>
    </div>
</div>