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

    public const REF_TYPE_SETOR_HEADER = 'setor_header';

    public const REF_TYPE_TARIK_SALDO = 'tarik_saldo';

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

    public static function getRefTypeOptions(): array
    {
        return [
            self::REF_TYPE_SETOR_HEADER => 'Setor Sampah',
            self::REF_TYPE_TARIK_SALDO => 'Tarik Saldo',
        ];
    }
}
