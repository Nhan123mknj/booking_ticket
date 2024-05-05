@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $paginator->onFirstPage() ? '#' : $paginator->previousPageUrl() }}">
                <i class="flaticon-left-arrow"></i>
            </a>
        </li>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <li class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : '#' }}">
                <i class="flaticon-right-arrow"></i>
            </a>
        </li>
    </ul>
@endif
