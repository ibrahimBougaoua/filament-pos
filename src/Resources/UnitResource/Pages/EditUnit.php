<?php

namespace IbrahimBougaoua\FilamentPos\Resources\UnitResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use IbrahimBougaoua\FilamentPos\Resources\UnitResource;

class EditUnit extends EditRecord
{
    protected static string $resource = UnitResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
