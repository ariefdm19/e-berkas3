<?php

namespace App\Filament\Resources\PengembalianAgunanResource\Pages;

use App\Filament\Resources\PengembalianAgunanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengembalianAgunans extends ListRecords
{
    protected static string $resource = PengembalianAgunanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
