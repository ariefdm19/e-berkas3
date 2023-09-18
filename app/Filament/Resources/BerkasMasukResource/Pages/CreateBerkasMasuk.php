<?php

namespace App\Filament\Resources\BerkasMasukResource\Pages;

use App\Filament\Resources\BerkasMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBerkasMasuk extends CreateRecord
{
    protected static ?string $title = 'Tambah Data Berkas Kredit';
    protected static string $resource = BerkasMasukResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
