<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PaymentsRelationManager extends RelationManager
{
    protected static string $relationship = 'payments';

    protected static ?string $recordTitleAttribute = 'reference';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('order_id')
                    ->label('Заказ')
                    ->relationship(
                        'order',
                        'number',
                        fn (Builder $query, RelationManager $livewire) => $query->whereBelongsTo($livewire->ownerRecord)
                    )
                    ->searchable()
                    ->hiddenOn('edit')
                    ->required(),

                Forms\Components\TextInput::make('reference')
                    ->columnSpan(fn (string $operation) => $operation === 'edit' ? 2 : 1)
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->label('Итог')
                    ->numeric()
                    ->rules(['regex:/^\d{1,6}(\.\d{0,2})?$/'])
                    ->required(),

                Forms\Components\TextInput::make('currency')
                    ->label('Валюта')
                    ->default('RUB')
                    ->disabled()
                    ->required(),

                Forms\Components\ToggleButtons::make('provider')
                    ->label('Платёжный шлюз')
                    ->inline()
                    ->grouped()
                    ->options([
                        'gmpays' => 'Gmpays',
                        'payselection' => 'Payselection',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('order_id')
            ->columns([
                Tables\Columns\TextColumn::make('order_id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
