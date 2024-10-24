<?php

namespace App\Filament\Resources\ClaudeResource\Pages;

use App\Filament\Resources\ClaudeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClaude extends EditRecord
{
    protected static string $resource = ClaudeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
