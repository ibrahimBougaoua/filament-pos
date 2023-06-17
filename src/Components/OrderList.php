<?php

namespace IbrahimBougaoua\FilamentPos\Components;

use Filament\Forms\Components\Component;

class OrderList extends Component
{
    protected array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function render()
    {
        return view('filament-pos::components.right-section.order-list');
    }
}