<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'kategori';

    protected $guarded = ['id'];

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }

    public function artikel(): HasMany
    {
        return $this->hasMany(Artikel::class, 'kategori_id');
    }
}
