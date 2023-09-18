<?php

namespace App\Filament\Resources\BerkasLemariResource\Pages;

use App\Filament\Resources\BerkasLemariResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerkasLemari extends CreateRecord
{
    protected static string $resource = BerkasLemariResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
