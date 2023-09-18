<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BerkasLemari;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BerkasLemariResource\Pages;
use App\Filament\Resources\BerkasLemariResource\RelationManagers;

class BerkasLemariResource extends Resource
{
    protected static ?string $model = BerkasLemari::class;
    protected static ?string $recordTitleAttribute = 'nama_lemari';

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $navigationLabel = 'Berkas Lemari Kredit';
    protected static ?string $navigationGroup = 'Berkas Kredit';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('kode_lemari')->label('Nomor Lemari'),
                    TextInput::make('nama_lemari')
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
                TextColumn::make('kode_lemari')->sortable()->searchable()->label('Nomor Lemari'),
                TextColumn::make('nama_lemari')->limit('50')->sortable()->searchable()
            ])
            ->filters([
                // Filter::make('is_featured')
                //     ->query(fn (Builder $query): Builder => $query->where('is_featured', true))
            ])
            ->actions([

                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Semua'),

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
            'index' => Pages\ListBerkasLemaris::route('/'),
            'create' => Pages\CreateBerkasLemari::route('/create'),
            'edit' => Pages\EditBerkasLemari::route('/{record}/edit'),
        ];
    }
}
