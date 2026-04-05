<div class="course-card">

    {{-- Thumbnail --}}
    <div class="course-card__thumbnail">
        <img src="{{ $course->thumbnail }}" alt="{{ $course->title }}" loading="lazy">

        {{-- Lessons Badge --}}
        <span class="course-card__badge">
            {{ $course->category->name }}
        </span>
    </div>

    {{-- Body --}}
    <div class="course-card__body">

        {{-- Title --}}
        <h3 class="course-card__title">
            <a href="https://www.youtube.com/playlist?list={{ $course->id }}" target="_blank">
                {{ $course->title }}
            </a>
        </h3>

        {{-- Channel --}}
        <p class="course-card__channel">
            <i class="fas fa-user-circle"></i>
            {{ $course->channel }}
        </p>
    </div>
</div>
