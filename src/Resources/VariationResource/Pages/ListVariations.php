<?php

namespace IbrahimBougaoua\FilamentPos\Resources\VariationResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentPos\Resources\VariationResource;

class ListVariations extends ListRecords
{
    protected static string $resource = VariationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
