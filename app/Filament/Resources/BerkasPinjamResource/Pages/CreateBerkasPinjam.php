<?php

namespace App\Filament\Resources\BerkasPinjamResource\Pages;

use App\Filament\Resources\BerkasPinjamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerkasPinjam extends CreateRecord
{
    protected static string $resource = BerkasPinjamResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
