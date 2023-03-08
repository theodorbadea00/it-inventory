<?php

namespace App\Filament\Resources\InventoryResource\Widgets;

use Filament\Widgets\Widget;

class InventoryOverview extends Widget
{
    protected static string $view = 'filament.resources.inventory-resource.widgets.inventory-overview';
    protected function getCards(): array
    {
        return [
            Card::make('Unique views', '192.1k'),
            Card::make('Bounce rate', '21%'),
            Card::make('Average time on page', '3:12'),
        ];
    }
}
