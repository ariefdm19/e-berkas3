<?php

namespace App\Filament\Resources\BerkasMasukResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Resources\BerkasMasukResource;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use App\Filament\Resources\BerkasMasukResource\Widgets\StatsOverview;
use App\Filament\Resources\BerkasMasukResource\Widgets\StatsBerkasMasukOverview;

class ListBerkasMasuks extends ListRecords
{
    protected static string $resource = BerkasMasukResource::class;
    protected static ?string $title = 'Register Berkas Kredit';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Berkas Kredit')->color('primary'),
            ExportAction::make()->label('Download Excel')->color('success'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsBerkasMasukOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'Semua Data' => Tab::make(),
            'Di Lemari' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'dilemari')),
            'Di Pinjam' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'dipinjam')),
            'Di Kembalikan' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'dikembalikan')),
        ];
    }
}
