<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarikSaldo extends Model
{
    use AuditedBySoftDelete, HasFactory, SoftDeletes;

    protected $table = 'tarik_saldo';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'tanggal_transaksi' => 'date',
            'total' => 'decimal:2',
        ];
    }

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
