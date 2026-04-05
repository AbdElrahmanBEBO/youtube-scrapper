<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدورات المكتشفة – كورسات يوتيوب</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite('resources/css/app.css')
</head>

<body>
    <main>
        @include('components.hero')

        <section class="courses-section">
            <div class="container">
                <div class="flex items-center">
                    <h2 class="text-2xl font-extrabold text-white">الدورات المكتشفة</h2>
                </div>

                @include('components.category-tabs')

                <div class="course-grid">
                    @forelse ($courses as $course)
                        @include('components.course-card')
                    @empty
                        <div class="course-grid__empty">
                            <i class="fas fa-inbox"></i>
                            <p>لا توجد دورات في هذا التصنيف بعد.</p>
                        </div>
                    @endforelse
                </div>

                @include('components.pagination')
            </div>
        </section>
    </main>

    @vite('resources/js/app.js')
</body>

</html>
