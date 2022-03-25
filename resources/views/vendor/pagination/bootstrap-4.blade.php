@if ($paginator->hasPages())
<!--begin::Pagination-->
<div class="d-flex justify-content-between align-items-center flex-wrap">
    <div class="d-flex flex-wrap py-2 mr-3">

        @if ($paginator->currentPage() > 2)
        <a href="{{ $paginator->url(1) }}" aria-label="@lang('pagination.previous')" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-double-arrow-back icon-xs"></i>
        </a>
        @endif

        @if ($paginator->onFirstPage())
            <a aria-label="@lang('pagination.previous')"  aria-disabled="true"  class="btn btn-icon btn-circle btn-sm btn-light-primary disabled active mr-2 my-1">
                <i class="ki ki-bold-arrow-back icon-xs"></i>
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-2 my-1">
                <i class="ki ki-bold-arrow-back icon-xs"></i>
            </a>
        @endif



        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a aria-disabled="true" class="btn btn-icon btn-circle btn-sm border-0 btn-hover-primary mr-2 my-1 disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="btn btn-icon btn-circle btn-sm border-0 btn-hover-primary active mr-2 my-1">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="btn btn-icon btn-circle btn-sm border-0 btn-hover-primary mr-2 my-1">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-2 my-1">
                <i class="ki ki-bold-arrow-next icon-xs"></i>
            </a>
        @else
            <a aria-label="@lang('pagination.next')"  aria-disabled="true"  class="btn btn-icon btn-circle btn-sm btn-light-primary disabled active mr-2 my-1">
                <i class="ki ki-bold-arrow-next icon-xs"></i>
            </a>
        @endif

        @if ($paginator->lastPage() - $paginator->currentPage() > 2)
        <a href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="@lang('pagination.next')" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-2 my-1">
            <i class="ki ki-bold-double-arrow-next icon-xs"></i>
        </a>
        @endif

    </div>
    <div class="d-flex align-items-center py-3">
        <span class="text-muted">{!! __('Displaying') !!} {{ $paginator->firstItem() }} {!! __('to') !!} {{ $paginator->lastItem() }} {!! __('of') !!} {{ $paginator->total() }} {!! __('results') !!}</span>
    </div>
</div>
<!--end:: Pagination-->
@endif