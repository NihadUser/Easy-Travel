<div class="pagination-container">
    <ul class="pagination">
        @if ($blogs->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        
        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
        @if ($i == $blogs->currentPage())
            <li class="active"><span>{{ $i }}</span></li>
        @else
            <li><a href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
        @endif
    @endfor

        @if ($blogs->hasMorePages())
            <li><a href="{{ $blogs->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
</div>