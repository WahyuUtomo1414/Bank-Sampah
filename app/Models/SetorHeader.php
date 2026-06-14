<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SetorHeader extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'setor_header';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'tanggal_transaksi' => 'date',
            'total_harga' => 'decimal:2',
        ];
    }

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function detail(): HasMany
    {
        return $this->hasMany(SetorDetail::class, 'setor_header_id');
    }
}
