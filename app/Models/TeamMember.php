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

    public function getUrlAttribute(): string
    {
        return route('tim.detail', $this->slug ?: $this->id);
    }
}
