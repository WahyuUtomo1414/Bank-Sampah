<?php

namespace App\Support;

use App\Models\BukuTransaksi;
use App\Models\SetorHeader;
use App\Models\TarikSaldo;

class BukuTransaksiSynchronizer
{
    public function syncForSetorHeader(SetorHeader $setorHeader): void
    {
        $this->upsert(
            refId: $setorHeader->getKey(),
            refType: BukuTransaksi::REF_TYPE_SETOR_HEADER,
            attributes: [
                'tanggal_transaksi' => $setorHeader->tanggal_transaksi,
                'warga_id' => $setorHeader->warga_id,
                'total_harga' => (float) $setorHeader->total_harga,
                'deskripsi' => $setorHeader->deskripsi,
                'active' => true,
            ],
        );
    }

    public function syncForTarikSaldo(TarikSaldo $tarikSaldo): void
    {
        $this->upsert(
            refId: $tarikSaldo->getKey(),
            refType: BukuTransaksi::REF_TYPE_TARIK_SALDO,
            attributes: [
                'tanggal_transaksi' => $tarikSaldo->tanggal_transaksi,
                'warga_id' => $tarikSaldo->warga_id,
                'total_harga' => -abs((float) $tarikSaldo->total),
                'deskripsi' => $tarikSaldo->deskripsi,
                'active' => true,
            ],
        );
    }

    public function deleteForSetorHeader(SetorHeader $setorHeader, bool $force = false): void
    {
        $this->deleteByReference($setorHeader->getKey(), BukuTransaksi::REF_TYPE_SETOR_HEADER, $force);
    }

    public function deleteForTarikSaldo(TarikSaldo $tarikSaldo, bool $force = false): void
    {
        $this->deleteByReference($tarikSaldo->getKey(), BukuTransaksi::REF_TYPE_TARIK_SALDO, $force);
    }

    public function restoreForSetorHeader(SetorHeader $setorHeader): void
    {
        $this->restoreByReference($setorHeader->getKey(), BukuTransaksi::REF_TYPE_SETOR_HEADER);
    }

    public function restoreForTarikSaldo(TarikSaldo $tarikSaldo): void
    {
        $this->restoreByReference($tarikSaldo->getKey(), BukuTransaksi::REF_TYPE_TARIK_SALDO);
    }

    protected function upsert(int $refId, string $refType, array $attributes): void
    {
        $bukuTransaksi = BukuTransaksi::withTrashed()
            ->firstOrNew([
                'ref_id' => $refId,
                'ref_type' => $refType,
            ]);

        $bukuTransaksi->fill($attributes);
        $bukuTransaksi->deleted_at = null;
        $bukuTransaksi->deleted_by = null;
        $bukuTransaksi->save();
    }

    protected function deleteByReference(int $refId, string $refType, bool $force = false): void
    {
        $bukuTransaksi = BukuTransaksi::withTrashed()
            ->where('ref_id', $refId)
            ->where('ref_type', $refType)
            ->first();

        if (! $bukuTransaksi) {
            return;
        }

        if ($force) {
            $bukuTransaksi->forceDelete();

            return;
        }

        if (! $bukuTransaksi->trashed()) {
            $bukuTransaksi->delete();
        }
    }

    protected function restoreByReference(int $refId, string $refType): void
    {
        $bukuTransaksi = BukuTransaksi::withTrashed()
            ->where('ref_id', $refId)
            ->where('ref_type', $refType)
            ->first();

        if ($bukuTransaksi?->trashed()) {
            $bukuTransaksi->restore();
        }
    }
}
