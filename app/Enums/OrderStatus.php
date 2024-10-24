<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasIcon, HasLabel
{
    case New = 'new';

    case Processing = 'processing';

    case Delivered = 'delivered';

    case Cancelled = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'Новый',
            self::Processing => 'В обработке',
            self::Delivered => 'Выполнен',
            self::Cancelled => 'Отменён',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::New => 'info',
            self::Processing => 'warning',
            self::Delivered => 'success',
            self::Cancelled => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::New => 'heroicon-m-sparkles',
            self::Processing => 'heroicon-m-arrow-path',
            self::Delivered => 'heroicon-m-check-badge',
            self::Cancelled => 'heroicon-m-x-circle',
        };
    }
}
