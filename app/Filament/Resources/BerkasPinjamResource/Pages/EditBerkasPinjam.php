<?php

namespace App\Filament\Resources\BerkasPinjamResource\Pages;

use App\Filament\Resources\BerkasPinjamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerkasPinjam extends EditRecord
{
    protected static string $resource = BerkasPinjamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
