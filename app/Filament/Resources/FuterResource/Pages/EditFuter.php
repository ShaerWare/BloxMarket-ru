<?php

namespace App\Filament\Resources\FuterResource\Pages;

use App\Filament\Resources\FuterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFuter extends EditRecord
{
    protected static string $resource = FuterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
