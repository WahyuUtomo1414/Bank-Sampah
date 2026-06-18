<?php

namespace App\Support;

use App\Models\BukuTransaksi;

class WargaSaldoService
{
    public function getSaldoByWargaId(?int $wargaId, ?int $ignoreTarikSaldoId = null): float
    {
        if (! $wargaId) {
            return 0;
        }

        return (float) BukuTransaksi::query()
            ->where('warga_id', $wargaId)
            ->when(
                $ignoreTarikSaldoId,
                fn ($query, int $ignoreTarikSaldoId) => $query
                    ->where(fn ($nestedQuery) => $nestedQuery
                        ->where('ref_type', '!=', BukuTransaksi::REF_TYPE_TARIK_SALDO)
                        ->orWhere('ref_id', '!=', $ignoreTarikSaldoId))
            )
            ->sum('total_harga');
    }

    public function hasSaldoCukup(?int $wargaId, float $nominal, ?int $ignoreTarikSaldoId = null): bool
    {
        return $this->getSaldoByWargaId($wargaId, $ignoreTarikSaldoId) >= $nominal;
    }

    public function formatSaldo(float $saldo): string
    {
        return 'Rp ' . number_format($saldo, 0, ',', '.');
    }
}
