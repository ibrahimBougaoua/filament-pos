<?php

namespace IbrahimBougaoua\FilamentPos\Resources\VariationResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentPos\Resources\VariationResource;

class EditVariation extends EditRecord
{
    protected static string $resource = VariationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
