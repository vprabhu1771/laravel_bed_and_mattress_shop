<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Set;
use Illuminate\Support\Str;

use App\Models\Size;

use App\Models\Thickness;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state)=> $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\Repeater::make('variants')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('size_id')
                            ->label('Size')
                            ->options(Size::all()->pluck('name', 'id'))
                            ->required(),
                        Forms\Components\Select::make('thickness_id')
                            ->label('Thickness')
                            ->options(Thickness::all()->pluck('value_in_inches', 'id'))
                            ->required(),
                        Forms\Components\TextInput::make('dimension_in_inches'),
                        Forms\Components\TextInput::make('dimension_in_feet'),
                        Forms\Components\TextInput::make('dimension_in_cm'),
                        Forms\Components\TextInput::make('product_variant_code'),
                        Forms\Components\TextInput::make('price')->required(),
                    ])
                    ->reorderable(true)
                    ->reorderableWithButtons()
                    // ->collapsible()
                    ->cloneable()
                    ->columns(7)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
