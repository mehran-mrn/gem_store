@if ($paginator->hasPages())
    <ul class="hiraola-pagination-box">
        @if ($paginator->onFirstPage())
            <li>
                <a class="page-item previous">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        @else
            <li>
                <a data-page="{{ urldecode($paginator->previousPageUrl()) }}"
                   href="{{ urldecode($paginator->previousPageUrl()) }}" id="previous" class="page-item previous">
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li>
                    <a class="page-item disabled" aria-disabled="true">
                        {{ $element }}
                    </a>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <a class="page-item active bg-dark">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="page-item as" href="{{ urldecode($url) }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ urldecode($paginator->nextPageUrl()) }}"
                   data-page="{{ urldecode($paginator->nextPageUrl()) }}"
                   id="next" class="page-item next">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        @else
            <li>
                <a class="page-item next">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
