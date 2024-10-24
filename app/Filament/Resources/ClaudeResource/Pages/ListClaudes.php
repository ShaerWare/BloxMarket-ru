<?php

namespace App\Filament\Resources\ClaudeResource\Pages;

use App\Filament\Resources\ClaudeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClaudes extends ListRecords
{
    protected static string $resource = ClaudeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
