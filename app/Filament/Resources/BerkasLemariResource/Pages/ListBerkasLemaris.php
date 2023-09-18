<?php

namespace App\Filament\Resources\BerkasLemariResource\Pages;

use App\Filament\Resources\BerkasLemariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBerkasLemaris extends ListRecords
{
    protected static ?string $title = 'Tempat Penyimpanan Berkas Kredit';
    protected static string $resource = BerkasLemariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Nomor Lemari')->color('primary'),
        ];
    }
}
