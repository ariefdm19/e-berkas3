<?php

namespace App\Filament\Resources\AgunanMasukResource\Pages;

use App\Filament\Resources\AgunanMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAgunanMasuk extends CreateRecord
{

    protected static ?string $title = 'Form Tambah Berkas Agunan';
    protected static string $resource = AgunanMasukResource::class;
}
