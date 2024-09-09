<style>
    .pagination-wrapper {
        text-align: center;
        margin-top: 20px;
    }

    .pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        display: inline;
    }

    .pagination li a,
    .pagination li span {
        color: #007bff;
        border: 1px solid #ddd;
        padding: 5px 10px;
        text-decoration: none;
        margin: 0 2px;
        font-size: 14px;
        border-radius: 4px;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .pagination li.disabled span {
        color: #ddd;
        pointer-events: none;
    }
</style>

@if ($paginator->hasPages())
    <ul class="pagination m-0">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
