<?php

namespace App\Services;

use App\Models\Playlist;
use Illuminate\Pagination\LengthAwarePaginator;

class PlaylistService
{
    public function __construct() {}

    public function getPlaylists(?int $page = 1, ?int $category_id = null, ?int $pageLength = 8): LengthAwarePaginator
    {
        return Playlist::with('category')
            ->when($category_id, fn($q) => $q->where('category_id', $category_id))
            ->paginate(perPage: $pageLength, page: $page);
    }
}
