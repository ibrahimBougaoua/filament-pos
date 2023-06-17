<?php

namespace IbrahimBougaoua\FilamentPos\Pages;

use IbrahimBougaoua\FilamentPos\Models\Category;
use IbrahimBougaoua\FilamentPos\Models\Product;
use Illuminate\Contracts\View\View;
use Filament\Pages\Page;

class PosPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament-pos::pages.pos-page';
    
    public $currency = "DA";

    public $search = "";

    public $categories = [];

    public $products = [];

    public $selected_products = [];

    public function mount()
    {
        $this->categories = Category::limit(5)->get();
        $this->all_products();
    }

    public function updatedSearch()
    {
        if( ! empty($this->search) )
            $this->products = Product::search($this->search)->get();
        else
            $this->all_products();
    }

    public function all_products()
    {
        $this->products = Product::all();
    }

    public function addProduct()
    {
        $this->selected_products[] = [
            'id' => '',
            'name' => '',
            'price' => 0,
            'description' => '',
            'qty' => 1
        ];
    }

    public function removeProduct($index)
    {
        unset($this->selected_products[$index]);
        $this->selected_products = array_values($this->selected_products);
    }

    public function submit()
    {
        foreach ($this->selected_products as $productData) {
            // Perform any necessary data processing or validation here
            // Access the submitted data using $productData['name'], $productData['price'], $productData['description']

            // Insert the data into your database
            Product::create([
                'name' => $productData['name'],
                'price' => $productData['price'],
                'description' => $productData['description'],
            ]);
        }

        // Optionally, you can display a success message or perform any other desired action
    }

    protected function getHeader(): View
    {
        return view('filament-pos::components.right-section.header');
    }

    protected function getFooter(): View
    {
        return view('filament-pos::components.right-section.header');
    }
}
