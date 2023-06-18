<?php

namespace IbrahimBougaoua\FilamentPos\Components;

use Filament\Forms\Components\Component;

class CustomerBanner extends Component
{
    public function render()
    {
        return view('filament-pos::components.left-right.customer-banner');
    }
}