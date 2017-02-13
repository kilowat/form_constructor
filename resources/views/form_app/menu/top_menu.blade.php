<ul class="nav navbar-nav">
    @foreach($menuItems as $item)
        <li class="@if($item['selected']) active @endif"><a href="{{ $item['link'] }}">{{ $item['text'] }}<span
                    class="sr-only">
                </span></a></li>
    @endforeach
</ul>