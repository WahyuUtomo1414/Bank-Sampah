<?php

namespace App\Filament\Widgets;

use App\Models\BukuTransaksi;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BukuTransaksiStatsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $setorQuery = BukuTransaksi::query()->where('ref_type', BukuTransaksi::REF_TYPE_SETOR_HEADER);
        $tarikQuery = BukuTransaksi::query()->where('ref_type', BukuTransaksi::REF_TYPE_TARIK_SALDO);

        $totalSetor = (float) $setorQuery->sum('total_harga');
        $totalTarik = abs((float) $tarikQuery->sum('total_harga'));
        $saldoBersih = $totalSetor - $totalTarik;
        $totalLedger = BukuTransaksi::query()->count();

        return [
            Stat::make('Total Ledger', number_format($totalLedger, 0, ',', '.'))
                ->description('Jumlah baris buku transaksi')
                ->icon('heroicon-o-receipt-percent')
                ->color('primary'),
            Stat::make('Setor Masuk', 'Rp ' . number_format($totalSetor, 0, ',', '.'))
                ->description('Akumulasi referensi setor')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success'),
            Stat::make('Tarik Keluar', 'Rp ' . number_format($totalTarik, 0, ',', '.'))
                ->description('Akumulasi referensi tarik saldo')
                ->icon('heroicon-o-arrow-up-tray')
                ->color('warning'),
            Stat::make('Saldo Bersih', 'Rp ' . number_format($saldoBersih, 0, ',', '.'))
                ->description('Setor Akhir')
                ->icon('heroicon-o-wallet')
                ->color('gray'),
        ];
    }
}
