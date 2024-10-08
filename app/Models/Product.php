<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $with = ['categories'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'image',
        'categories'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter(Builder $query, array $filters): void {
        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query->where('title', 'like', '%' . $search . '%')
        );
    }

    public function scopeFilterByCategory(Builder $query, $categorySlug) {
        if ($categorySlug) {
            $query->whereHas('categories', function ($query) use($categorySlug) { 
                $query->where('slug', $categorySlug);
            });
        }
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
