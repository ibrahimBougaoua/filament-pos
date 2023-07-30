<?php

namespace IbrahimBougaoua\FilamentPos\Components;

use Filament\Forms\Components\Component;

class Header extends Component
{
    public function render()
    {
        return view('filament-pos::components.left-section.header');
    }
}
