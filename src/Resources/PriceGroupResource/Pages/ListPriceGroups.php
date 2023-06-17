<?php

namespace IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource;

class ListPriceGroups extends ListRecords
{
    protected static string $resource = PriceGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
