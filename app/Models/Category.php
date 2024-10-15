<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'parent_id',
        'order',
        'is_active',
    ];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function scopeActive($query): mixed
    {
        return $query->where('is_active', '=', true);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function getParentCategory(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function getChildCategory(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
