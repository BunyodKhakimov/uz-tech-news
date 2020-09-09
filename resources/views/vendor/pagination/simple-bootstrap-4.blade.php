@if ($paginator->hasPages())
    <nav>
        <ul class="actions">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="button big previous disabled">Previous Page</span>
                </li>
            @else
                <li class="page-item">
                    <a class="button big previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous Page</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="button big next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next Page</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="button big next disabled">Next Page</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
