<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Useravatar extends Model
{
    protected $table = 'user_avatar';
    protected $fillable = [
        'picture_id',
        'user_id'
    ];

    public function picture(): MorphOne {
        return $this->morphOne(Picture::class, 'imageable');
    }
    
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
