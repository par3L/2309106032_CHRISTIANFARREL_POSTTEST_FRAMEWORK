<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'images',
        'price',
        'delivery_time',
        'revisions',
        'rating',
        'reviews_count',
        'orders_count',
        'is_active',
        'featured'
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'is_active' => 'boolean',
        'featured' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gig) {
            if (empty($gig->slug)) {
                $gig->slug = Str::slug($gig->title);
            }
        });

        static::updating(function ($gig) {
            if ($gig->isDirty('title') && empty($gig->slug)) {
                $gig->slug = Str::slug($gig->title);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
