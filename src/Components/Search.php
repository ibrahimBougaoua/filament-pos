<?php

namespace IbrahimBougaoua\FilamentPos\Components;

use Filament\Forms\Components\Component;

class Search extends Component
{
    public $search;

    public function render()
    {
        return view('filament-pos::components.left-section.search');
    }
}