<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Playlist;
use App\Services\AI\AIService;
use App\Services\YouTubeService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class YoutupeScrapeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Category $category;

    public function __construct(string $categoryStr)
    {
        $this->category = Category::whereRaw('LOWER(name) = ?', [Str::lower($categoryStr)])
        ->firstOrCreate(['name' => $categoryStr]);
    }


    public function handle(YouTubeService $youtube, AIService $ai): void
    {
        if ($this->category->is_scraped || Cache::get('scrape_stop')) return;

        $titles = $ai->getCategoriesGroupedTitles($this->category);

        foreach ($titles as $title) {
            if (Cache::get('scrape_stop')) return;

            $data = $youtube
                ->search($title)
                ->map(
                    fn($item) => [
                        'id' => $item['id']['playlistId'],
                        'title' => $item['snippet']['title'],
                        'description' => $item['snippet']['description'],
                        'thumbnail' => $item['snippet']['thumbnails']['default']['url'],
                        'channel' => $item['snippet']['channelTitle'],
                        'category_id' => $this->category->id,
                    ]
                )->toArray() ?? [];

            if (!empty($data)) {
                Playlist::upsert($data, ['id'], ['title', 'description', 'thumbnail', 'channel', 'category_id']);
            }
        }

        $this->category->markAsScraped();
    }

    public function uniqueId(): string
    {
        return $this->category;
    }
}
