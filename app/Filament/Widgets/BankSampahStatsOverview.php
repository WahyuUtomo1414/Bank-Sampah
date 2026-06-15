<?php

namespace App\Filament\Widgets;

use App\Models\Barang;
use App\Models\SetorHeader;
use App\Models\TarikSaldo;
use App\Models\Warga;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BankSampahStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalWarga = Warga::query()->count();
        $totalProduk = Barang::query()->count();
        $totalSetoran = SetorHeader::query()->count();
        $totalSaldo = (float) SetorHeader::query()->sum('total_harga')
            - (float) TarikSaldo::query()->sum('total');

        return [
            Stat::make('Total Warga', number_format($totalWarga, 0, ',', '.'))
                ->description('Nasabah yang terdaftar')
                ->icon('heroicon-o-user-group')
                ->color('success'),
            Stat::make('Total Produk / Sampah', number_format($totalProduk, 0, ',', '.'))
                ->description('Jenis barang yang dikelola')
                ->icon('heroicon-o-archive-box')
                ->color('primary'),
            Stat::make('Total Setoran', number_format($totalSetoran, 0, ',', '.'))
                ->description('Jumlah transaksi setor')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('warning'),
            Stat::make('Total Saldo', 'Rp ' . number_format($totalSaldo, 0, ',', '.'))
                ->description('Akumulasi saldo seluruh warga')
                ->icon('heroicon-o-wallet')
                ->color('gray'),
        ];
    }
}
