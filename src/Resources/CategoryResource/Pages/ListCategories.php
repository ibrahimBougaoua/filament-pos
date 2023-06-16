<?php

namespace IbrahimBougaoua\FilamentPos\Resources\CategoryResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentPos\Resources\CategoryResource;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
