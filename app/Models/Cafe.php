<?php

namespace App\Models;

use Database\Factories\CafeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cafe extends Model
{
    /** @use HasFactory<CafeFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'location',
        'address',
        'latitude',
        'longitude',
        'coordinates',
        'rating',
        'opening_hours',
        'facilities',
        'tags',
        'image',
        'subtitle',
        'description',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'rating' => 'float',
        ];
    }

    /**
     * Get the menu items for the cafe.
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * Get the reviews for the cafe.
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
