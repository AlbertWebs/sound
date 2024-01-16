

@if ($paginator->hasPages())
    <ul class="pagination toolbox-item">

        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                <i class="d-icon-arrow-left"></i>Prev
                </a>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="d-icon-arrow-left"></i>Prev</a>
            </li>
        @endif

        {{--  --}}
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span aria-disabled="true">
                <span class="page-link">{{ $element }}</span>
            </span>
        @endif



        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#"> {{ $page }} <span class="sr-only">{{ $page }}</span></a>
                    </li>
                @else
                    <li class="page-item">
                        <a href="{{ $url }}" class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
        @endforeach
        {{--  --}}



        {{--  --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link page-link-next" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">Next <i class="d-icon-arrow-right"></i></a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link page-link-btn" href="{{ $paginator->nextPageUrl() }}"><i class="icon-angle-right"></i></a>
        </li>
        @endif
        {{--  --}}
    </ul>
@endif
