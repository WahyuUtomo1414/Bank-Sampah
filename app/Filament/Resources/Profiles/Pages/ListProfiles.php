<?php

namespace App\Filament\Resources\Profiles\Pages;

use App\Models\Profile;
use App\Filament\Resources\Profiles\ProfileResource;
use Filament\Resources\Pages\ListRecords;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    public function mount(): void
    {
        parent::mount();

        $record = Profile::query()->first();

        if ($record) {
            $this->redirect(ProfileResource::getUrl('view', ['record' => $record]));

            return;
        }

        $this->redirect(ProfileResource::getUrl('create'));
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
