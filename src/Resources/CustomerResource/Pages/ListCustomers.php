<?php

namespace IbrahimBougaoua\FilamentPos\Resources\CustomerResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use IbrahimBougaoua\FilamentPos\Resources\CustomerResource;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
