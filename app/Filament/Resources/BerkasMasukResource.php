<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BerkasMasuk;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BerkasMasukResource\Pages;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\BerkasMasukResource\RelationManagers;
use App\Filament\Resources\BerkasMasukResource\Widgets\StatsOverview;
use App\Filament\Resources\BerkasMasukResource\Widgets\StatsBerkasMasukOverview;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\DisallowedRanges;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class BerkasMasukResource extends Resource
{
    protected static ?string $model = BerkasMasuk::class;
    // protected static ?string $title = 'Custom Page Title';
    protected static ?string $navigationIcon = 'heroicon-o-folder-plus';
    protected static ?string $navigationLabel = 'Register Berkas Kredit';
    protected static ?string $navigationGroup = 'Berkas Kredit';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('CIF')
                        ->numeric()
                        ->required(),
                    TextInput::make('no_rekening')->numeric()->required(),
                    TextInput::make('nama_debitur')->required(),
                    // TextInput::make('kode_lemari'),
                    Select::make('kode_lemari')
                        ->relationship('BerkasLemari', 'kode_lemari')->required(),


                    FileUpload::make('upload_berkas')
                        ->preserveFilenames()
                        ->downloadable()
                        ->openable()
                        ->previewable()->getUploadedFileNameForStorageUsing(
                            fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                ->prepend('cif'),
                        ),
                    Select::make('status')
                        ->preload()
                        ->live()
                        ->options([
                            'dilemari' => 'Di Lemari',
                        ])
                        ->default('dilemari'),

                    // TextInput::make('status')
                    //     ->default('dilemari')
                    // // ->disabled()



                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('No')->state(
                //     static function ($rowLoop, HasTable $livewire): string {
                //         return (string) ($rowLoop->iteration +
                //             ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1
                //             ))
                //         );
                //     }
                // ),
                TextColumn::make('CIF')->limit('50')->sortable()->searchable()->label('CIF'),
                TextColumn::make('no_rekening')->limit('50')->sortable()->searchable(),
                TextColumn::make('nama_debitur')->limit('50')->sortable()->searchable(),
                // TextColumn::make('kode_lemari'),
                TextColumn::make('BerkasLemari.kode_lemari')->sortable(),
                // SpatieMediaLibraryImageColumn::make('upload_berkas'),
                TextColumn::make('upload_berkas'),

                TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->searchable()
                    ->color(fn (string $state): string => match ($state) {
                        'dikembalikan' => 'warning',
                        'dipinjam' => 'danger',
                        'dilemari' => 'success',
                    })





            ])->defaultSort('created_at', 'desc')
            ->filters([
                // Filter::make('dilemari')
                //     ->query(fn (Builder $query): Builder => $query->where('status', true)),
                // Filter::make('dipinjam')
                //     ->query(fn (Builder $query): Builder => $query->where('status', true)),
                // Filter::make('dikembalikan')
                //     ->query(fn (Builder $query): Builder => $query->where('status', true))
                SelectFilter::make('status')->label('Pilih Data')
                    ->multiple()
                    ->options([
                        'dikembalikan' => 'dikembalikan',
                        'dipinjam' => 'dipinjam',
                        'dilemari' => 'dilemari',
                    ])

            ])
            ->actions([
                Tables\Actions\ViewAction::make()->button()->label('Lihat Detail'),
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button()->label('Hapus'),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Semua'),
                    ExportBulkAction::make(),
                ])->label('Pengaturan Data'),
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
            'index' => Pages\ListBerkasMasuks::route('/'),
            'create' => Pages\CreateBerkasMasuk::route('/create'),
            'edit' => Pages\EditBerkasMasuk::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
            StatsBerkasMasukOverview::class
        ];
    }
}
