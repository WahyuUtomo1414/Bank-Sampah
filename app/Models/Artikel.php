<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'artikel';

    protected $guarded = ['id'];

    public function getPrimaryImagePath(): ?string
    {
        $path = $this->foto ?: $this->thumbnail;

        return blank($path) ? null : ltrim($path, '/');
    }

    public function getPrimaryImageUrl(): ?string
    {
        $path = $this->getPrimaryImagePath();

        if (blank($path)) {
            return null;
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        if (Str::startsWith($path, ['images/', 'build/'])) {
            return file_exists(public_path($path)) ? asset($path) : null;
        }

        if (Str::startsWith($path, 'storage/')) {
            $relativePath = Str::after($path, 'storage/');

            return Storage::disk('public')->exists($relativePath)
                ? Storage::disk('public')->url($relativePath)
                : null;
        }

        return Storage::disk('public')->exists($path)
            ? Storage::disk('public')->url($path)
            : null;
    }

    public function hasPrimaryImage(): bool
    {
        return filled($this->getPrimaryImageUrl());
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
