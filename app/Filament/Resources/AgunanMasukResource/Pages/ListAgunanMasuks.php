<?php

namespace App\Filament\Resources\AgunanMasukResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;
use App\Filament\Resources\AgunanMasukResource;
use App\Filament\Resources\AgunanMasukResource\Widgets\StatsAgunan;
use App\Filament\Resources\AgunanMasukResource\Widgets\AgunanMasukStats;

class ListAgunanMasuks extends ListRecords
{
    protected static ?string $title = 'Register Berkas Agunan';
    protected static string $resource = AgunanMasukResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Berkas Agunan')->color('primary'),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            StatsAgunan::class,
        ];
    }
    public function getTabs(): array
    {
        return [
            'Semua Data' => Tab::make(),
            'Brankas Khasanah' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_id', '1')),
            'Brankas SBD' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_id', '2')),
            'Di Pinjam' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_id', '3')),
            'Di Kembalikan Ke Petugas' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status_id', '4')),
        ];
    }
}
