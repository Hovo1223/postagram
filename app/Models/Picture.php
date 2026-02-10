<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Picture extends Model
{
      protected $casts = [
    'picture' => 'array',
];
    protected $table = 'pictures';
    public string $picture_url;

    protected $fillable = [
        'picture',
        'imageable_type',
        'imageable_id',
        'img_alt'
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

   public function Useravatar() {
    return $this->BelongsTo(Picture::class);
   }

 

}
