<?php

namespace App\Filament\Resources\BerkasLemariResource\Pages;

use App\Filament\Resources\BerkasLemariResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBerkasLemari extends EditRecord
{
    protected static string $resource = BerkasLemariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
