<?php

namespace App\Http\Controllers;

use App\Jobs\YoutupeScrapeJob;
use App\Services\CategoryService;
use App\Services\PlaylistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ScrapperController extends Controller
{
    public function __construct(protected PlaylistService $playlistService, protected CategoryService $categoryService) {}


    public function index(Request $request)
    {
        return view('index', [
            'categories'       => $this->categoryService->getCategories(),
            'courses'    => $this->playlistService->getPlaylists(
                page: request('page', 1),
                category_id: request('category_id'),

            ),
        ]);
    }


    public function startScrapperQueue(Request $request)
    {
        $categories = $request->input('categories');

        Cache::forget('scrape_stop');

        foreach ($categories as $category) {
            YoutupeScrapeJob::dispatch($category);
        }

        return response()->json(['message' => 'search started successfully']);
    }

    public function stopScrapperQueue()
    {
        Cache::put('scrape_stop', true);

        return response()->json(['message' => 'search stopped successfully']);
    }
}
