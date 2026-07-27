<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['page', 'section', 'key', 'value', 'type', 'label', 'sort_order'];

    /**
     * Get a content value by page, section, and key.
     */
    public static function getValue(string $page, string $section, string $key, string $default = ''): string
    {
        $record = static::where('page', $page)
            ->where('section', $section)
            ->where('key', $key)
            ->first();

        return $record ? ($record->value ?? $default) : $default;
    }

    /**
     * Get all content for a page as nested section => key => value array.
     */
    public static function forPage(string $page): array
    {
        $items  = static::where('page', $page)->orderBy('sort_order')->get();
        $result = [];

        foreach ($items as $item) {
            $result[$item->section][$item->key] = $item->value;
        }

        return $result;
    }
}
