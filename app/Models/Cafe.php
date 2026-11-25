<?php

namespace App\Models;

use Database\Factories\CafeFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

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

    /**
     * Resolve the display image URL for the cafe.
     *
     * @return Attribute<string, never>
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::get(function (): string {
            $image = trim((string) ($this->image ?? ''));

            if ($image === '') {
                return asset('images/cafe1.webp');
            }

            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
                return $image;
            }

            if (is_file(public_path($image))) {
                return asset($image);
            }

            if (is_file(public_path('storage/'.$image))) {
                return asset('storage/'.$image);
            }

            return asset($image);
        });
    }

    /**
     * Parse the comma-separated tags into a normalized list.
     *
     * @return Attribute<list<string>, never>
     */
    protected function tagList(): Attribute
    {
        return Attribute::get(function (): array {
            if (blank($this->tags)) {
                return [];
            }

            return array_values(array_filter(
                array_map('trim', explode(',', (string) $this->tags)),
                static fn (string $tag): bool => $tag !== ''
            ));
        });
    }

    /**
     * Filter cafes matching a search term across name, location, tags, or summary.
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        $term = trim((string) $search);

        if ($term === '') {
            return $query;
        }

        $like = '%'.$term.'%';

        return $query->where(function (Builder $subQuery) use ($like): void {
            $subQuery->where('name', 'like', $like)
                ->orWhere('location', 'like', $like)
                ->orWhere('tags', 'like', $like)
                ->orWhere('subtitle', 'like', $like)
                ->orWhere('description', 'like', $like);
        });
    }

    /**
     * Filter cafes by district/location.
     */
    public function scopeInLocation(Builder $query, ?string $location): Builder
    {
        $district = trim((string) $location);

        if ($district === '') {
            return $query;
        }

        return $query->where('location', $district);
    }

    /**
     * Filter cafes containing the given tag.
     */
    public function scopeWithTag(Builder $query, ?string $tag): Builder
    {
        $value = trim((string) $tag);

        if ($value === '') {
            return $query;
        }

        return $query->where('tags', 'like', '%'.$value.'%');
    }

    /**
     * Count cafe occurrences per tag, ordered by popularity then alphabetically.
     *
     * @return Collection<int, array{name: string, count: int}>
     */
    public static function tagCounts(): Collection
    {
        $counts = [];

        static::query()
            ->whereNotNull('tags')
            ->pluck('tags')
            ->each(function (string $rawTags) use (&$counts): void {
                $uniqueTags = array_unique(array_filter(
                    array_map('trim', explode(',', $rawTags)),
                    static fn (string $tag): bool => $tag !== ''
                ));

                foreach ($uniqueTags as $tag) {
                    $counts[$tag] = ($counts[$tag] ?? 0) + 1;
                }
            });

        return collect($counts)
            ->map(static fn (int $count, string $name): array => [
                'name' => $name,
                'count' => $count,
            ])
            ->sort(static fn (array $a, array $b): int => $b['count'] <=> $a['count'] ?: strcmp($a['name'], $b['name']))
            ->values();
    }
}
