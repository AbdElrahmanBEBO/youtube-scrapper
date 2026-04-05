<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'is_scraped', 'scraped_at'];

    protected $casts = [
        'is_scraped' => 'boolean',
        'scraped_at' => 'datetime',
    ];

    public function markAsScraped(): void
    {
        $this->update([
            'is_scraped' => true,
            'scraped_at' => now(),
        ]);
    }

    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }
}
