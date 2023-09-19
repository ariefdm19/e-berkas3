<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AgunanMasuk;
use App\Models\AgunanPinjam;
use Filament\Resources\Resource;
use Filament\Forms\Actions\Action;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AgunanPinjamResource\Pages;
use Saade\FilamentAutograph\Forms\Components\SignaturePad;
use App\Filament\Resources\AgunanPinjamResource\RelationManagers;
use Saade\FilamentAutograph\Forms\Components\Enums\DownloadableFormat;

class AgunanPinjamResource extends Resource
{
    protected static ?string $model = AgunanPinjam::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Berkas Peminjaman Agunan';
    protected static ?string $navigationGroup = 'Berkas Agunan';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([


                    Select::make('no_rekening')
                        ->options(AgunanMasuk::query()->pluck('no_rekening', 'no_rekening'))
                        ->live()
                        ->searchable(),

                    Select::make('nama_debitur')
                        ->options(fn (Get $get): Collection => AgunanMasuk::query()
                            ->where('no_rekening', $get('no_rekening'))
                            ->pluck('nama_debitur', 'nama_debitur')),

                    Forms\Components\TextInput::make('nama_peminjam')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('tanggal_pinjam')
                        ->required(),
                    SignaturePad::make('ttd1')->label(__('TTD Meminjam'))
                        ->filename('autograph')             // Filename of the downloaded file (defaults to 'signature')
                        ->downloadable()

                        ->backgroundColor('rgba(0,0,0,0)')                // Allow download of the signature (defaults to false)
                        ->downloadableFormats([             // Available formats for download (defaults to all)
                            DownloadableFormat::PNG,
                            DownloadableFormat::JPG,
                            DownloadableFormat::SVG,
                        ])
                        ->downloadActionDropdownPlacement('center-end'),
                    Forms\Components\Textarea::make('keperluan')
                        ->maxLength(65535)
                        ->columnSpanFull(),
                    Forms\Components\DatePicker::make('tanggal_kembali'),
                    SignaturePad::make('ttd2')->label(__('TTD Pegembalian'))
                        ->filename('autograph')             // Filename of the downloaded file (defaults to 'signature')
                        ->downloadable()
                        ->backgroundColor('rgba(0,0,0,0)')                // Allow download of the signature (defaults to false)
                        ->downloadableFormats([             // Available formats for download (defaults to all)
                            DownloadableFormat::PNG,
                            DownloadableFormat::JPG,
                            DownloadableFormat::SVG,
                        ])
                        ->downloadActionDropdownPlacement('center-end'),
                    // Forms\Components\TextInput::make('status_id')
                    //     ->required()
                    //     ->columnSpanFull(),

                    Select::make('status_id')
                        ->relationship('statusAgunan', 'nama_status')
                        ->default(3)
                        ->selectablePlaceholder(false),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->state(
                    static function ($rowLoop, HasTable $livewire): string {
                        return (string) ($rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                Tables\Columns\TextColumn::make('no_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_debitur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_peminjam')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pinjam')
                    ->date()
                    ->sortable(),
                TextColumn::make('ttd1')->hidden(),
                Tables\Columns\TextColumn::make('tanggal_kembali')
                    ->date()
                    ->sortable(),
                TextColumn::make('ttd2')->hidden(),
                TextColumn::make('statusAgunan.nama_status')
                    ->sortable()
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Brankas Khasanah' => 'primary',
                        'Brankas SBD' => 'info',
                        'Di Pinjam' => 'danger',
                        'Di Kembalikan Ke Petugas' => 'success',
                    }),
                Tables\Columns\TextColumn::make('keperluan'),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgunanPinjams::route('/'),
            'create' => Pages\CreateAgunanPinjam::route('/create'),
            'edit' => Pages\EditAgunanPinjam::route('/{record}/edit'),
        ];
    }
}
