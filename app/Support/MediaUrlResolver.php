<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaUrlResolver
{
    public function resolve(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $normalizedPath = ltrim($path, '/');

        if (Str::startsWith($normalizedPath, ['images/', 'build/', 'storage/'])) {
            return asset($normalizedPath);
        }

        return Storage::disk('public')->url($normalizedPath);
    }
}
