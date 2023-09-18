<?php

namespace App\Filament\Resources\BerkasMasukResource\Widgets;

use App\Models\BerkasMasuk;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsBerkasMasukOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.berkas-masuk-resource.widgets.stats-berkas-masuk-overview';


    protected function getStats(): array
    {
        return [

            // Stat::make('Berkas Kredit Di Lemari', BerkasMasuk::where('status', 'dilemari')->count()),
            // Stat::make('Berkas Kredit Di Pinjam', BerkasMasuk::where('status', 'dipinjam')->count()),
            // Stat::make('Berkas Kredit Di Kembalikan', BerkasMasuk::where('status', 'dikembalikan')->count()),

            Stat::make('BERKAS KREDIT DILEMARI', BerkasMasuk::where('status', 'dilemari')->count())
                ->descriptionIcon('heroicon-m-check-circle')
                ->description('Status Berkas Di Lemari')
                // ->chart([10, 2, 10, 3, 15, 4, 17])
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('success'),

            Stat::make('BERKAS KREDIT DI PINJAM', BerkasMasuk::where('status', 'dipinjam')->count())
                ->descriptionIcon('heroicon-m-x-circle')
                ->description('Status Berkas Di Pinjam')
                // ->chart([17, 4, 15, 3, 10, 2, 10])
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),

            Stat::make('BERKAS KREDIT DI KEMBALIKAN', BerkasMasuk::where('status', 'dikembalikan')->count())
                ->descriptionIcon('heroicon-m-user-circle')
                ->description('Status Berkas Di Kembalikan Ke Petugas')
                // ->chart([10, 2, 10, 3, 15, 4, 17])
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('warning'),

        ];
    }
}
