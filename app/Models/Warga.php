<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warga extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'warga';

    protected $guarded = ['id'];

    public function setorHeader(): HasMany
    {
        return $this->hasMany(SetorHeader::class, 'warga_id');
    }

    public function tarikSaldo(): HasMany
    {
        return $this->hasMany(TarikSaldo::class, 'warga_id');
    }

    public function bukuTransaksi(): HasMany
    {
        return $this->hasMany(BukuTransaksi::class, 'warga_id');
    }
}
