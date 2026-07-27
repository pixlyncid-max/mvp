<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'type', 'label'];

    /**
     * Get a setting value by key with optional default.
     */
    public static function get(string $key, string $default = ''): string
    {
        $setting = static::where('key', $key)->first();
        return $setting ? ($setting->value ?? $default) : $default;
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, ?string $value): void
    {
        static::where('key', $key)->update(['value' => $value]);
    }

    /**
     * Get all settings grouped by their group key.
     */
    public static function allGrouped(): array
    {
        return static::all()->groupBy('group')->toArray();
    }

    /**
     * Get all settings as flat key => value array.
     */
    public static function allFlat(): array
    {
        return static::all()->pluck('value', 'key')->toArray();
    }
}
