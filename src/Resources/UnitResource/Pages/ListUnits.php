<?php

namespace IbrahimBougaoua\FilamentPos\Resources\UnitResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentPos\Resources\UnitResource;

class ListUnits extends ListRecords
{
    protected static string $resource = UnitResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
