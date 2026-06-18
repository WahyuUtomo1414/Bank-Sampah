<?php

namespace App\Filament\Resources\SetorHeaders\Schemas;

use App\Models\Barang;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class SetorHeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Transaksi Setor')
                    ->schema([
                        Select::make('warga_id')
                            ->label('Warga')
                            ->relationship('warga', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('kode')
                            ->label('Kode Transaksi')
                            ->readOnly()
                            ->dehydrated(false)
                            ->maxLength(128)
                            ->placeholder('Digenerate otomatis saat data disimpan'),
                        DatePicker::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->default(now())
                            ->required(),
                        TextInput::make('total_harga')
                            ->label('Total Harga')
                            ->readOnly()
                            ->dehydrated(false)
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->prefix('Rp'),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                        Hidden::make('active')->default(true)->dehydrated(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Detail Setor')
                    ->schema([
                        Repeater::make('detail')
                            ->label('Item Setoran')
                            ->relationship()
                            ->minItems(1)
                            ->live()
                            ->afterStateHydrated(function (Repeater $component, Set $set): void {
                                $items = self::normalizeItems($component->getState() ?? []);

                                $component->state($items);
                                self::syncGrandTotal($set, $items);
                            })
                            ->afterStateUpdated(fn ($state, Set $set) => self::syncGrandTotal($set, $state))
                            ->mutateRelationshipDataBeforeCreateUsing(fn (array $data): array => self::normalizeItem($data))
                            ->mutateRelationshipDataBeforeSaveUsing(fn (array $data): array => self::normalizeItem($data))
                            ->schema([
                                Select::make('barang_id')
                                    ->label('Barang')
                                    ->relationship('barang', 'nama')
                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        self::syncItemState($get, $set);
                                    }),
                                TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1)
                                    ->default(1)
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        self::syncItemState($get, $set);
                                    }),
                                TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->readOnly()
                                    ->dehydrated()
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->default(0),
                                Hidden::make('active')->default(true)->dehydrated(false),
                            ])
                            ->columns(3)
                            ->columnSpanFull()
                            ->deleteAction(fn (Action $action) => $action->after(
                                fn (Repeater $component, Set $set) => self::syncGrandTotal($set, $component->getState())
                            )),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function normalizeItems(array $items): array
    {
        return array_map(fn (array $item): array => self::normalizeItem($item), $items);
    }

    public static function normalizeItem(array $item): array
    {
        $jumlah = max(1, (int) ($item['jumlah'] ?? 0));
        $subtotal = self::calculateSubtotal(
            barangId: $item['barang_id'] ?? null,
            jumlah: $jumlah,
        );

        $item['jumlah'] = $jumlah;
        $item['subtotal'] = $subtotal;

        return $item;
    }

    public static function calculateTotal(array $items): float
    {
        return collect(self::normalizeItems($items))
            ->sum(fn (array $item): float => (float) ($item['subtotal'] ?? 0));
    }

    protected static function syncItemState(Get $get, Set $set): void
    {
        $jumlah = max(1, (int) ($get('jumlah') ?? 0));
        $subtotal = self::calculateSubtotal(
            barangId: $get('barang_id'),
            jumlah: $jumlah,
        );

        $set('jumlah', $jumlah);
        $set('subtotal', $subtotal);
        $set('../../total_harga', self::calculateTotal($get('../../detail') ?? []));
    }

    protected static function syncGrandTotal(Set $set, mixed $state): void
    {
        $set('total_harga', self::calculateTotal($state ?? []));
    }

    protected static function calculateSubtotal(int|string|null $barangId, int $jumlah): float
    {
        if (blank($barangId)) {
            return 0;
        }

        $harga = (float) (Barang::query()->find($barangId)?->harga ?? 0);

        return $harga * $jumlah;
    }
}
