<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return OrderResource::getWidgets();
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Все вместе'),
            'новые' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'в обработке' => Tab::make()->query(fn ($query) => $query->where('status', 'processing')),
            'выполнены' => Tab::make()->query(fn ($query) => $query->where('status', 'delivered')),
            'отменены' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }
}
