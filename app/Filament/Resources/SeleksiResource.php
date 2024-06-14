<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeleksiResource\Pages;
use App\Filament\Resources\SeleksiResource\RelationManagers;
use App\Models\Seleksi;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeleksiResource extends Resource
{
    protected static ?string $model = Seleksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('tahap')
                ->label("Tahap"),
                Tables\Columns\TextColumn::make('tanggal')
                ->date()
                ->label("Tanggal"),
                Tables\Columns\TextColumn::make('keterangan')
                ->label("Keterangan"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('Peserta')
                    ->icon('heroicon-s-user-group')
                    ->url(function (Seleksi $record) {
                        return SeleksiResource::getUrl('peserta', $record);
                    })
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index'     => Pages\ListSeleksis::route('/'),
            'create'    => Pages\CreateSeleksi::route('/create'),
            'edit'      => Pages\EditSeleksi::route('/{record}/edit'),
            'peserta'   => Pages\PesertaSeleksi::route('/{record}/peserta'),
        ];
    }    
}
