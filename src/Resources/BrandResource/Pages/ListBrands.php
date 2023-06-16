<?php

namespace IbrahimBougaoua\FilamentPos\Resources\BrandResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentPos\Resources\BrandResource;

class ListBrands extends ListRecords
{
    protected static string $resource = BrandResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
