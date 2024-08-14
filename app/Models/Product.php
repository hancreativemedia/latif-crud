<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $with = ['category'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'image',
        'category_id'
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

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
