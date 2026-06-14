<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BukuTransaksi extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'buku_transaksi';

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
}
