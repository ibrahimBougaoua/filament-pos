<?php

namespace IbrahimBougaoua\FilamentPos\Resources\BrandResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentPos\Resources\BrandResource;

class EditBrand extends EditRecord
{
    protected static string $resource = BrandResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
