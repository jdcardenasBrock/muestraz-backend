@php
    // Scroll hacia arriba al cambiar de página.
    // Puedes modificar el selector según donde quieras que haga scroll.
    $scrollTo = $scrollTo ?? 'body';

    $scrollIntoViewJsSnippet = $scrollTo !== false
        ? "document.querySelector('{$scrollTo}').scrollIntoView({ behavior: 'smooth' })"
        : '';
@endphp

<style>
    .pagination-mini .inline-flex {
        padding: 1px 4px !important;
        font-size: 10px !important;
        line-height: 1 !important;
    }
    .pagination-mini button,
    .pagination-mini span {
        padding: 1px 6px !important;
        font-size: 11px !important;
        min-width: 22px;
    }
    .pagination-mini svg {
        width: 12px !important;
        height: 12px !important;
    }
</style>

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">

            {{-- Mobile --}}
            <div class="flex justify-between flex-1 sm:hidden">
                {{-- Prev --}}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button type="button"
                        x-on:click="{!! $scrollIntoViewJsSnippet !!}"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        class="relative inline-flex items-center px-4 py-2 text-sm bg-white border border-gray-300 rounded-md">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <button type="button"
                        x-on:click="{!! $scrollIntoViewJsSnippet !!}"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm bg-white border border-gray-300 rounded-md">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm text-gray-500 bg-white border border-gray-300 cursor-default rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </div>

            {{-- Desktop --}}
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Mostrando
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        a
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        de
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        resultados
                    </p>
                </div>

                <div>
                    <span class="relative z-0 inline-flex rounded-md shadow-sm">

                        {{-- Pages --}}
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm bg-white border border-gray-300 cursor-default">
                                    {{ $element }}
                                </span>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <span aria-current="page" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm bg-gray-200 border border-gray-300 cursor-default">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <button type="button"
                                            x-on:click="{!! $scrollIntoViewJsSnippet !!}"
                                            wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm bg-white border border-gray-300 hover:bg-gray-100">
                                            {{ $page }}
                                        </button>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </span>
                </div>
            </div>

        </nav>
    @endif
</div>
