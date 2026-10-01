<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'role',
        'category',
        'specialty',
        'bio',
        'expertise',
        'education',
        'experience',
        'achievements',
        'photo_url',
        'email',
        'phone',
        'linkedin',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'expertise'    => 'array',
        'education'    => 'array',
        'experience'   => 'array',
        'achievements' => 'array',
        'is_active'    => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($member) {
            if (empty($member->slug)) {
                $baseSlug = Str::slug($member->name);
                $slug = $baseSlug;
                $count = 1;
                while (static::where('slug', $slug)->where('id', '!=', $member->id ?? 0)->exists()) {
                    $slug = "{$baseSlug}-{$count}";
                    $count++;
                }
                $member->slug = $slug;
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getCategorySlugAttribute(): string
    {
        $cat = strtolower(trim($this->category ?? ''));
        if (!empty($cat)) {
            if (str_contains($cat, 'partner')) return 'partner';
            if (str_contains($cat, 'associate')) return 'associate';
            if (str_contains($cat, 'support')) return 'support';
            return $cat;
        }

        $role = strtolower($this->role ?? '');
        if (str_contains($role, 'partner')) return 'partner';
        if (str_contains($role, 'associate')) return 'associate';
        if (str_contains($role, 'support') || str_contains($role, 'staff') || str_contains($role, 'paralegal') || str_contains($role, 'admin') || str_contains($role, 'assistant')) return 'support';

        return 'partner';
    }

    public function getUrlAttribute(): string
    {
        return route('tim.detail', $this->slug ?: $this->id);
    }
}
