<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // protected $with = ['products'];

    protected $fillable = [
        'name',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }

    public function scopeCategory(Builder $query, array $categories): void {
        $query->when($categories['category'] ?? false, fn ($query, $categories) =>
            $query->where('name', 'like', '%' . $categories . '%')
        );
    }
}
