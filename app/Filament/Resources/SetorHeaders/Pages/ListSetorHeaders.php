<?php

namespace App\Filament\Resources\SetorHeaders\Pages;

use App\Filament\Resources\SetorHeaders\SetorHeaderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSetorHeaders extends ListRecords
{
    protected static string $resource = SetorHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
