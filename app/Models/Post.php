<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title',
        'desc',
        'picture_id',
        'user_id',
        'published_at',
        'status'
    ];

    public function picture(): MorphOne
    {
        return $this->morphOne(Picture::class, 'imageable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
