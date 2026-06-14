<?php

namespace App\Filament\Resources\SetorHeaders\Pages;

use App\Filament\Resources\SetorHeaders\SetorHeaderResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSetorHeader extends EditRecord
{
    protected static string $resource = SetorHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
