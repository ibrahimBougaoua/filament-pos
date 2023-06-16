<?php

namespace IbrahimBougaoua\FilamentPos\Resources\CategoryResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentPos\Resources\CategoryResource;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
