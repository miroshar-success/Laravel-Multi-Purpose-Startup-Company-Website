@if ($paginator->hasPages())
    <nav class="box-pagination">
        <ul class="pagination flex-wrap justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link page-prev prev-page" href="#" aria-disabled="true"></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-prev" href="{{ $paginator->previousPageUrl() }}"></a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item">
                        <a class="page-link page-dotted disabled" href="#" aria-disabled="true">{{ $element }}</a>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item">
                                <a class="page-link active" href="#" aria-current="page">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link page-next" href="{{ $paginator->nextPageUrl() }}"></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-next disabled" href="#" aria-disabled="true"></a>
                </li>
            @endif
        </ul>
    </nav>
@endif
