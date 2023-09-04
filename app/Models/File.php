<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class File extends Model
{
    protected $appends = ['full_path'];

    public static function getUniqueFileName(object $file, string $name = 'file', int $len = 15): string
    {
        $str_unique = md5(Str::random($len) . uniqid());
        $exists = static::where("name", "LIKE", "%{$str_unique}%")->exists();
        if ($exists) {
            self::getUniqueFileName($file);
        }
        return strtolower(str_replace(' ', '_', $name) . '_' . $str_unique . '.' . $file->getClientOriginalExtension());
    }

    public function resourceDelete(string $disk = 'public'): bool
    {
        $file = "{$this->path}/{$this->name}";
        if (Storage::disk($disk)->exists($file)) {
            Storage::disk($disk)->delete($file);
            return true;
        }
        return false;
    }

    public function getFullPathAttribute()
    {
        return asset("storage/{$this->path}/{$this->name}");
    }

    public function resource(): MorphTo
    {
        return $this->morphTo();
    }
}
