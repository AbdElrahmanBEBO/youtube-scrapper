<div class="category-tabs">
    <div class="container p-0! flex items-center justify-between flex-wrap">
        <div class="my-2 md:my-0 text-xs ms-1.5 text-text-muted">تم العثور على {{$courses->total()}} دورة في {{request('category_id') ? 1 : $categories->count()}} تصنيفات</div>
        <div class="my-2 md:my-0 flex gap-2 flex-wrap items-center justify-end">
            @php
                $activeCategoryId = (int) request('category_id');
            @endphp
            <a
                href="{{ route('courses.index') }}"
                class="category-tabs__item {{ !$activeCategoryId ? 'category-tabs__item--active' : '' }}"
            >
                All
            </a>
            @foreach ($categories as $category)
                <a
                    href="{{ route('courses.index', ['category_id' => $category->id]) }}"
                    class="category-tabs__item category-tabs__item{{ $category->id == $activeCategoryId ? '--active' : '' }}"
                >
                    {{ $category->name }}
                    @if ($category->playlists_count > 0)
                        <span class="category-tabs__count">({{ $category->playlists_count }})</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</div>
