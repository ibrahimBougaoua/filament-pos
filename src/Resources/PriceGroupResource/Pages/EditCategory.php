<?php

namespace IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentPos\Resources\PriceGroupResource;

class EditPriceGroup extends EditRecord
{
    protected static string $resource = PriceGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
