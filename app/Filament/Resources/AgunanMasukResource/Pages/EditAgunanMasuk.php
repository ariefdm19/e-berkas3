<?php

namespace App\Filament\Resources\AgunanMasukResource\Pages;

use App\Filament\Resources\AgunanMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgunanMasuk extends EditRecord
{
    protected static string $resource = AgunanMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
