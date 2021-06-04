@if ($paginator->hasPages())
    <div class="row tm-mb-90 justify-content-center">
        <div class="col-md-6 d-flex justify-content-between align-items-center tm-paging-col">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="btn btn-primary tm-btn-prev mb-2 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <
                </a>
            @else
                <a class="btn btn-primary tm-btn-prev mb-2 " href="{{ $paginator->previousPageUrl() }}" rel="prev"  aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <
                </a>
            @endif

            {{-- Pagination Elements --}}
            <div class="tm-paging d-flex">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="active tm-paging-link" aria-current="page">{{ $page }}</a>
                        @else
                            <a class="tm-paging-link" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </div>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())

                <a class="btn btn-primary tm-btn-next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    >
                </a>

            @else
                <a class="btn btn-primary tm-btn-next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    >
                </a>
            @endif
        </div>
    </div>
@endif
