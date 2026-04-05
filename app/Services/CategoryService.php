<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function __construct() {}

    public function getCategories()
    {
        return Category::withCount('playlists')->get();
    }
}
