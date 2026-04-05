@php
    $current  = $courses->CurrentPage();
    $last     = $courses->LastPage();
    $window   = 3;
@endphp

<div class="pagination">
    <a
        href="{{ $current > 1 ? route('courses.index', ['page' => $current - 1]) : '#' }}"
        class="pagination__arrow {{ $current == 1 ? 'pagination__arrow--disabled' : '' }}"
        aria-label="الصفحة السابقة"
    >
        <i class="fas fa-arrow-right"></i>
    </a>


    @for ($page = 1; $page <= $last; $page++)
        @if ($page == 1 || $page == $last || abs($page - $current) <= $window)
            <a
                href="{{ request()->fullUrlWithQuery(['page' => $page]) }}"
                class="pagination__page {{ $page == $current ? 'pagination__page--active' : '' }}"
            >
                {{ $page }}
            </a>
        @elseif (abs($page - $current) == $window + 1)
            <span class="pagination__ellipsis">…</span>
        @endif
    @endfor

    {{-- Next --}}
    <a
        href="{{ $current < $last ? route('courses.index', ['page' => $current + 1]) : '#' }}"
        class="pagination__arrow {{ $current == $last ? 'pagination__arrow--disabled' : '' }}"
        aria-label="الصفحة التالية"
    >
        <i class="fas fa-arrow-left"></i>
    </a>
</div>
