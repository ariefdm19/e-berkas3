<?php

namespace App\Filament\Resources\AgunanMasukResource\Widgets;

use App\Models\AgunanMasuk;
use Faker\Provider\Base;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AgunanMasukStats extends BaseWidget
{
    // protected static string $view = 'filament.resources.agunan-masuk-resource.widgets.agunan-masuk-stats';

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Berkas Agunan Masuk', AgunanMasuk::all()->count()),
        ];
    }
}
