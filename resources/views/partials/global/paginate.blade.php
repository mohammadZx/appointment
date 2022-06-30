<nav class="pagination">
<ul>
    @if($items->currentPage() > 1)
    <li><a href="?page={{$items->currentPage() - 1}}"><i class="sl sl-icon-arrow-right"></i></a></li>
    @endif
    @for($i=1; $i <= $items->lastPage(); $i++)
    <li><a @if($items->currentPage() == $i) class="current-page" @endif href="?page={{$i}}">{{$i}}</a></li>
    @endfor
    @if($items->currentPage() < $items->lastPage())
    <li><a href="?page={{$items->currentPage() + 1}}"><i class="sl sl-icon-arrow-left"></i></a></li>
    @endif
</ul>
</nav>