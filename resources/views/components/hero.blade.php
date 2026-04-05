<section class="bg-hero border-b-[1.5px] border-border py-4">
    <div class="container">
        <div class="hero__content">
            <h1 class="text-[32px] text-white mb-2 font-extrabold">جمع الدورات التعليمية من يوتيوب</h1>
            <p class="text-[14px] text-text-muted mb-8">أدخل التصنيفات واضغط ابدأ – النظام سيجمع الدورات تلقائياً باستخدام الذكاء الاصطناعي</p>


            <div class="grid grid-cols-1 md:grid-cols-2 bg-bg border border-border rounded-lg overflow-hidden p-4">
                <div>
                    <label class="block my-2">أدخل التصنيفات (كل تصنيف في سطر جديد)</label>
                    <textarea id="search-textarea" class="w-full bg-surface rounded-md p-2" rows=4>@foreach($categories as $category){{ $category->name . "\n" }}@endforeach</textarea>
                </div>
                <div class="grid gap-2 content-end mt-2 md:mt-10 md:mx-6">
                    <button type="button" class="btn btn--primary flex-1 justify-center text-[16px]" id="search-btn">
                        <i class="fas fa-play"></i>
                        ابدأ الجمع
                    </button>
                    <button type="button" class="btn btn--ghost flex-1 justify-center text-[16px]" id="stop-btn">
                        <i class="fas fa-pause"></i>
                        إيقاف
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
