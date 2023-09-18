<?php

namespace App\Filament\Resources\BerkasPinjamResource\Pages;

use App\Filament\Resources\BerkasPinjamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\BerkasMasukResource;
use App\Filament\Resources\BerkasMasukResource\Widgets\StatsBerkasMasukOverview;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListBerkasPinjams extends ListRecords
{
    protected static ?string $title = 'Peminjaman Berkas Kredit';
    protected static string $resource = BerkasPinjamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Peminjaman'),
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


    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         StatsBerkasMasukOverview::class,
    //     ];
    // }
}
