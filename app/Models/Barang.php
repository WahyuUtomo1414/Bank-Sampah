<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Barang extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'barang';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
        ];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function setorDetail(): HasMany
    {
        return $this->hasMany(SetorDetail::class, 'barang_id');
    }

    public function getPhotoPath(): ?string
    {
        return blank($this->foto) ? null : ltrim($this->foto, '/');
    }

    public function getPhotoUrl(): string
    {
        $path = $this->getPhotoPath();

        if (blank($path)) {
            return asset('images/barang-placeholder.svg');
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        if (Str::startsWith($path, ['images/', 'build/'])) {
            return file_exists(public_path($path))
                ? asset($path)
                : asset('images/barang-placeholder.svg');
        }

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        return Storage::disk('public')->exists($path)
            ? Storage::disk('public')->url($path)
            : asset('images/barang-placeholder.svg');
    }

    public function hasPhoto(): bool
    {
        $path = $this->getPhotoPath();

        if (blank($path) || filter_var($path, FILTER_VALIDATE_URL)) {
            return filled($path);
        }

        if (Str::startsWith($path, ['images/', 'build/'])) {
            return file_exists(public_path($path));
        }

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        return Storage::disk('public')->exists($path);
    }
}
