<?php

namespace App\Filament\Resources\AgunanPinjamResource\Pages;

use App\Filament\Resources\AgunanPinjamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgunanPinjam extends EditRecord
{
    protected static string $resource = AgunanPinjamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
