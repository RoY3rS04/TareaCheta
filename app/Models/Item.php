<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'price',
        'royalties',
        'size',
        'method',
        'user_id',
        'collection_id'
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    function collection(): BelongsTo {
        return $this->belongsTo(Collection::class);
    }

    function likes(): MorphMany {
        return $this->morphMany(Like::class, 'likeable');
    }
}
