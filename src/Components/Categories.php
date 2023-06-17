<?php

namespace IbrahimBougaoua\FilamentPos\Components;

use Filament\Forms\Components\Component;

class Categories extends Component
{
    public $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    public function render()
    {
        return view('filament-pos::components.left-section.categories');
    }
}