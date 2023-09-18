<?php

namespace App\Filament\Resources\AgunanMasukResource\Widgets;

use App\Models\AgunanMasuk;
use App\Models\PengembalianAgunan;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsAgunan extends BaseWidget
{
    // protected static string $view = 'filament.resources.agunan-masuk-resource.widgets.stats-agunan';

    protected function getStats(): array
    {
        return [

            Stat::make('Berkas Agunan Brankas Khasanah', AgunanMasuk::where('status_id', '1')->count()),
            Stat::make('Berkas Agunan Brankas SBD', AgunanMasuk::where('status_id', '2')->count()),
            Stat::make('Berkas Agunan Di Pinjam', AgunanMasuk::where('status_id', '3')->count()),
            Stat::make('Berkas Agunan Di Kembalikan Ke Petugas', AgunanMasuk::where('status_id', '4')->count()),
            // Stat::make('Berkas Agunan Sudah Di Kembalikan Ke Debitur', PengembalianAgunan::where('status_id', 'sudah dikembalikan ke debitur')->count()),

        ];
    }
}
