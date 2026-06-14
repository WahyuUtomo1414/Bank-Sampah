<?php

namespace App\Filament\Resources\SetorDetails\Pages;

use App\Filament\Resources\SetorDetails\SetorDetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSetorDetails extends ListRecords
{
    protected static string $resource = SetorDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
