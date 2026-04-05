<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class YouTubeService
{
    private string $apiKey;
    private string $baseUrl = 'https://www.googleapis.com/youtube/v3';

    public function __construct()
    {
        $this->apiKey = config('services.youtube.key');
    }

    public function search(string $query, int $maxResults = 2): Collection
    {
        $response = Http::withOptions(['verify' => false])
            ->withHeaders(['Content-Type' => 'application/json'])
            ->get("{$this->baseUrl}/search", [
                'key'        => $this->apiKey,
                'q'          => $query,
                'part'       => 'snippet',
                'type'       => 'playlist',
                'maxResults' => $maxResults,
                'relevanceLanguage' => 'ar',
            ]);

        if ($response->failed()) {
            throw new \RuntimeException('YouTube request failed: ' . $response->body());
        }

        return collect($response->json('items', []));
    }
}
