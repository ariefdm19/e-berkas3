<?php

namespace App\Filament\Resources\StatusAgunanResource\Pages;

use App\Filament\Resources\StatusAgunanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusAgunans extends ListRecords
{
    protected static string $resource = StatusAgunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
