<?php

namespace App\Filament\Resources\TarikSaldos\Schemas;

use App\Support\WargaSaldoService;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class TarikSaldoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tarik Saldo')
                    ->schema([
                        Select::make('warga_id')
                            ->label('Warga')
                            ->relationship('warga', 'nama')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->helperText(fn (Get $get): string => self::getSaldoDescription($get))
                            ->required(),
                        TextInput::make('total')
                            ->label('Total')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->live()
                            ->helperText(fn (Get $get): string => self::getSaldoSetelahTarikDescription($get))
                            ->prefix('Rp'),
                        DatePicker::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->default(now())
                            ->required(),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                        Hidden::make('active')->default(true)->dehydrated(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    protected static function getSaldoDescription(Get $get): string
    {
        $saldoService = app(WargaSaldoService::class);
        $saldo = $saldoService->getSaldoByWargaId((int) ($get('warga_id') ?? 0));

        if (! $get('warga_id')) {
            return 'Pilih warga untuk melihat saldo saat ini.';
        }

        return 'Saldo saat ini: ' . $saldoService->formatSaldo($saldo);
    }

    protected static function getSaldoSetelahTarikDescription(Get $get): string
    {
        $saldoService = app(WargaSaldoService::class);
        $wargaId = (int) ($get('warga_id') ?? 0);

        if (! $wargaId) {
            return 'Pilih warga terlebih dahulu sebelum mengisi nominal tarik saldo.';
        }

        $saldoSaatIni = $saldoService->getSaldoByWargaId($wargaId);
        $nominalTarik = abs((float) ($get('total') ?? 0));
        $saldoSetelahTarik = $saldoSaatIni - $nominalTarik;

        return 'Sisa saldo setelah tarik: ' . $saldoService->formatSaldo($saldoSetelahTarik);
    }
}
