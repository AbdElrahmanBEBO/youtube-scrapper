<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Playlist extends Model
{
    public $timestamps = false;

    public $incrementing  = false;
    protected $keyType    = 'string';

    protected $fillable = [
        'id',
        'title',
        'description',
        'thumbnail',
        'channel',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
