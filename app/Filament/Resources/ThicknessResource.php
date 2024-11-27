<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThicknessResource\Pages;
use App\Filament\Resources\ThicknessResource\RelationManagers;
use App\Models\Thickness;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThicknessResource extends Resource
{
    protected static ?string $model = Thickness::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('value_in_inches')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('value_in_feet')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('value_in_cm')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextInputColumn::make('value_in_inches')                    
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('value_in_feet')                    
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('value_in_cm')                    
                    ->sortable(),
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
            'index' => Pages\ListThicknesses::route('/'),
            'create' => Pages\CreateThickness::route('/create'),
            'edit' => Pages\EditThickness::route('/{record}/edit'),
        ];
    }
}
