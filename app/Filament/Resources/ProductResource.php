<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Название')
                    ->required()
                    ->maxLength(255),
                Select::make('categories')
                    ->multiple()
                    ->relationship(titleAttribute: 'name')
                    ->label('Категория'),
                Forms\Components\RichEditor::make('detail')
                    ->label('Описание')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Фото')
                    ->image(),
                Forms\Components\TextInput::make('filename')
                    ->label('Модель')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('price')
                    ->label('Цена')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->postfix('руб.'),
                Forms\Components\TextInput::make('slug')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->label('Видимость')
                    ->default(1)
                    ->required(),
                Forms\Components\TextInput::make('sku')
                    ->label('Артикул')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Toggle::make('on_sale')
                    ->label('Участвует в распродаже')
                    ->required(),
                Forms\Components\TextInput::make('sale_price')
                    ->label('Распродажная цена')
                    ->numeric()
                    ->default(null),
                Forms\Components\DateTimePicker::make('date_sale_start')
                    ->label('Начало распродажи'),
                Forms\Components\DateTimePicker::make('date_sale_end')
                    ->label('Окончание распродажи'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Фото'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable(),
                /*Tables\Columns\TextColumn::make('categories.name')
                    ->label('Категория')
                    ->numeric()
                    ->sortable(),*/
                Tables\Columns\TextColumn::make('categories_count')
                    ->counts([
                        'categories' => fn (Builder $query) => $query->where('is_active', true),
                    ])
                    ->label('Категории'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Видимость')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('Артикул')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена, руб.')
                    ->sortable(),
                Tables\Columns\IconColumn::make('on_sale')
                    ->label('Участвует в распродаже')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sale_price')
                    ->label('Распродажная цена')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_sale_start')
                    ->label('Начало распродажи')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_sale_end')
                    ->label('Окончание распродажи')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата создания')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Дата обновления')
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

    public static function getModelLabel(): string
    {
        return 'Товар';
    }

    public static function getPageTitle(): string
    {
        return 'Товар';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Товары';
    }
}
