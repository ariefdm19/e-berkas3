<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BerkasMasuk;
use App\Models\BerkasPinjam;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BerkasPinjamResource\Pages;
use App\Filament\Resources\BerkasPinjamResource\RelationManagers;


class BerkasPinjamResource extends Resource
{
    protected static ?string $model = BerkasPinjam::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Peminjaman Berkas Kredit';
    protected static ?string $navigationGroup = 'Berkas Kredit';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([

                    Select::make('no_rekening')
                        ->options(BerkasMasuk::query()->pluck('no_rekening', 'no_rekening'))
                        ->live()
                        ->searchable()
                        ->unique(ignoreRecord: true),

                    Select::make('nama_debitur')
                        ->preload()

                        ->selectablePlaceholder(false)
                        // ->selectablePlaceholder(false)
                        ->options(fn (Get $get): Collection => BerkasMasuk::query()
                            ->where('no_rekening', $get('no_rekening'))
                            ->pluck('nama_debitur', 'nama_debitur'))->disabled(),


                    // Forms\Components\TextInput::make('no_rekening'),
                    // Select::make('no_rekening')
                    //     ->relationship('berkasMasuk', 'no_rekening'),

                    // Forms\Components\TextInput::make('nama_debitur'),
                    Forms\Components\TextInput::make('nama_peminjam')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('jabatan_peminjam')
                        ->required()
                        ->maxLength(255),
                    // Forms\Components\DatePicker::make('tanggal_pinjam')
                    //     ->required(),

                    \Filament\Forms\Components\DatePicker::make('tanggal_pinjam')
                        ->default(now())
                        ->seconds(),
                    Forms\Components\Textarea::make('keterangan_digunakan')
                        ->required()
                        ->maxLength(65535)
                        ->columnSpanFull(),
                    Forms\Components\DatePicker::make('tanggal_kembali'),
                    \Filament\Forms\Components\Select::make('status')
                        ->options([
                            'dilemari' => 'dilemari',
                            'dipinjam' => 'dipinjam',
                            'dikembalikan' => 'dikembalikan',
                        ])->default('dipinjam')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('No')->state(
                    static function ($rowLoop, HasTable $livewire): string {
                        return (string) ($rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * ($livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                // TextColumn::make('no_rekening')
                //     ->searchable(),
                TextColumn::make('berkasMasuk.no_rekening')
                    ->label('No Rekening')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('berkasMasuk.nama_debitur')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama_peminjam')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jabatan_peminjam')
                    ->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tanggal_pinjam')
                    ->date()
                    ->sortable()->sortable(),
                Tables\Columns\TextColumn::make('keterangan_digunakan')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tanggal_kembali')
                    ->searchable()->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dikembalikan' => 'warning',
                        'dipinjam' => 'danger',
                        'dilemari' => 'success',
                    })->sortable(),

                // \Filament\Tables\Columns\SelectColumn::make('status')
                //     ->default('status')
                //     ->options([
                //         'dikembalikan' => 'dikembalikan',
                //         'dipinjam' => 'dipinjam',
                //         'dilemari' => 'dilemari',
                //     ])->selectablePlaceholder(false),

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
                SelectFilter::make('status')
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
            'index' => Pages\ListBerkasPinjams::route('/'),
            'create' => Pages\CreateBerkasPinjam::route('/create'),
            'edit' => Pages\EditBerkasPinjam::route('/{record}/edit'),
        ];
    }
}
