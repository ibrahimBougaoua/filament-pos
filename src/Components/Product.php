<?php

namespace IbrahimBougaoua\FilamentPos\Components;

use Filament\Forms\Components\Component;

class Product extends Component
{
    public $title;
    public $description;
    public $price;

    public function __construct($title,$description,$price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
    }

    public function render()
    {
        return view('filament-pos::components.left-section.product');
    }
}