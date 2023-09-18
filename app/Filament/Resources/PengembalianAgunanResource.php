<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AgunanMasuk;
use Filament\Resources\Resource;
use App\Models\PengembalianAgunan;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengembalianAgunanResource\Pages;
use App\Filament\Resources\PengembalianAgunanResource\RelationManagers;

class PengembalianAgunanResource extends Resource
{
    protected static ?string $model = PengembalianAgunan::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static ?string $navigationLabel = 'Pengembalian Berkas Agunan';
    protected static ?string $navigationGroup = 'Pengembalian Berkas Agunan';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('no_rekening')
                    ->options(AgunanMasuk::query()->pluck('no_rekening', 'no_rekening'))
                    ->live()
                    ->searchable(),

                Select::make('nama_debitur')
                    ->options(fn (Get $get): Collection => AgunanMasuk::query()
                        ->where('no_rekening', $get('no_rekening'))
                        ->pluck('nama_debitur', 'nama_debitur')),
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),
                Forms\Components\TextInput::make('jaminan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_hp')
                    ->maxLength(255),
                Forms\Components\TextInput::make('upload_bukti')
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                \Filament\Forms\Components\Select::make('status_id')
                    ->options([
                        'sudah dikembalikan ke debitur' => 'Sudah Di Kembalikan Ke Debitur',
                    ])->default('sudah dikembalikan ke debitur')->selectablePlaceholder(false)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_rekening')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_debitur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jaminan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_hp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('upload_bukti')
                    ->searchable(),
                TextColumn::make('status_id')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'sudah dikembalikan ke debitur' => 'success',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPengembalianAgunans::route('/'),
            'create' => Pages\CreatePengembalianAgunan::route('/create'),
            'edit' => Pages\EditPengembalianAgunan::route('/{record}/edit'),
        ];
    }
}
