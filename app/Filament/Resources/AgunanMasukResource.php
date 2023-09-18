<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AgunanMasuk;
use App\Models\BerkasMasuk;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AgunanMasukResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\AgunanMasukResource\RelationManagers;
use App\Filament\Resources\AgunanMasukResource\Widgets\StatsAgunan;
use App\Filament\Resources\AgunanMasukResource\Widgets\AgunanMasukStats;
use App\Filament\Resources\AgunanMasukResource\Widgets\StatsAgunanMasuk;

class AgunanMasukResource extends Resource
{
    protected static ?string $model = AgunanMasuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-plus';
    protected static ?string $navigationLabel = 'Register Berkas Agunan';
    protected static ?string $navigationGroup = 'Berkas Agunan';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Select::make('no_rekening')
                        ->options(BerkasMasuk::query()->pluck('no_rekening', 'no_rekening'))
                        ->live()
                        ->searchable(),

                    Select::make('nama_debitur')
                        ->options(fn (Get $get): Collection => BerkasMasuk::query()
                            ->where('no_rekening', $get('no_rekening'))
                            ->pluck('nama_debitur', 'nama_debitur')),

                    FileUpload::make('upload_berkas')
                        ->preserveFilenames()
                        ->downloadable()
                        ->openable()
                        ->previewable()->getUploadedFileNameForStorageUsing(
                            fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                ->prepend('no'),
                        ),

                    Select::make('status_id')
                        ->relationship('statusAgunan', 'nama_status')->preload(),


                    // Forms\Components\TextInput::make('nomor_kredit')
                    //     ->required()
                    //     ->maxLength(255),
                    // Forms\Components\TextInput::make('nama_debitur')
                    //     ->required()
                    //     ->maxLength(255),
                    // Forms\Components\TextInput::make('upload_berkas')
                    //     ->maxLength(255),
                    // Forms\Components\TextInput::make('status')
                    //     ->required()
                    //     ->maxLength(255),
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
                Tables\Columns\TextColumn::make('upload_berkas')
                    ->searchable(),

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

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()->label('Lihat Detail'),
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
            'index' => Pages\ListAgunanMasuks::route('/'),
            'create' => Pages\CreateAgunanMasuk::route('/create'),
            'edit' => Pages\EditAgunanMasuk::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            AgunanMasukStats::class,
            StatsAgunan::class,
        ];
    }
}
