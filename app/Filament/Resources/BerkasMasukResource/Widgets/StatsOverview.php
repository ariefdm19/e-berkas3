<?php

namespace App\Filament\Resources\BerkasMasukResource\Widgets;

use App\Models\AgunanMasuk;
use App\Models\BerkasMasuk;
use App\Models\BerkasLemari;
use App\Models\PengembalianAgunan;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.berkas-masuk-resource.widgets.stats-overview';
    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        return [


            Stat::make('JUMLAH BERKAS KREDIT', BerkasMasuk::all()->count())
                ->descriptionIcon('heroicon-m-folder-plus')
                ->description('Jumlah Berkas')
                // ->chart([10, 2, 10, 3, 15, 4, 17])
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => '$dispatch("BerkasMasuk")',
                ]),

            Stat::make('LEMARI BERKAS KREDIT', BerkasLemari::all()->count())
                ->descriptionIcon('heroicon-m-queue-list')
                ->description('Jumlah Lemari')
                // ->chart([17, 4, 15, 3, 10, 2, 10])
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('success'),

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
                ->color('success'),

            Stat::make('BERKAS KREDIT DI KEMBALIKAN', BerkasMasuk::where('status', 'dikembalikan')->count())
                ->descriptionIcon('heroicon-m-user-circle')
                ->description('Status Berkas Di Kembalikan Ke Petugas')
                // ->chart([10, 2, 10, 3, 15, 4, 17])
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('success'),


            //BATAS BERKAS AGUNAN

            Stat::make('JUMLAH BERKAS AGUNAN', AgunanMasuk::all()->count())
                ->descriptionIcon('heroicon-m-folder-plus')
                ->description('Jumlah Berkas')
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),

            Stat::make('BERKAS AGUNAN DI BRANKAS KHASANAH', AgunanMasuk::where('status_id', '1')->count())
                ->descriptionIcon('heroicon-m-check-circle')
                ->description('Status Berkas Di khasanah')
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),

            Stat::make('BERKAS AGUNAN DI BRANKAS SBD', AgunanMasuk::where('status_id', '2')->count())
                ->descriptionIcon('heroicon-m-check-circle')
                ->description('Status Berkas Di SBD')
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),

            Stat::make('BERKAS AGUNAN DI PINJAM', AgunanMasuk::where('status_id', '3')->count())
                ->descriptionIcon('heroicon-m-x-circle')
                ->description('Status Berkas Di Pinjam')
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),

            Stat::make('BERKAS AGUNAN DI KEMBALIKAN', AgunanMasuk::where('status_id', '4')->count())
                ->descriptionIcon('heroicon-m-user-circle')
                ->description('Status Berkas Di Kembalikan Ke Petugas')
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),

            Stat::make('BERKAS AGUNAN KEMBALI KE DEBITUR', PengembalianAgunan::where('status_id', 'sudah dikembalikan ke debitur')->count())
                ->descriptionIcon('heroicon-m-identification')
                ->description('Status Berkas Di Kembalikan Ke Debitur')
                ->chart([10, 10, 10, 10, 10, 10, 10])
                ->color('danger'),
        ];
    }
}
