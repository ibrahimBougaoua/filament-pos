<?php

namespace IbrahimBougaoua\FilamentPos\Pages;

use Filament\Forms\Components\TextInput;
use IbrahimBougaoua\FilamentPos\Models\Category;
use IbrahimBougaoua\FilamentPos\Models\Product;
use Illuminate\Contracts\View\View;
use Filament\Pages\Page;
use Illuminate\Support\Arr;

class PosPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament-pos::pages.pos-page';
    
    public $currency = "DA";

    public $subtotal = 0;

    public $discount = 0;

    public $tax = 0;

    public $total = 0;

    public $search = "";

    public $categories = [];

    public $products = [];

    public $selected_products = [];

    public function mount()
    {
        $this->categories = Category::limit(6)->get();
        $this->all_products();
    }

    public function getProductsByCategory($cate_id = null)
    {
        if( ! empty($cate_id) )
            $this->products = Product::where('cate_id',$cate_id)->get();
        else
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

    public function addProduct($id,$name,$image,$price,$description,$qty)
    {
        if( ! Arr::has($this->selected_products, $id) )
            $this->selected_products[$id] = [
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'description' => $description,
                'qty' => $qty
            ];
        else
            $this->selected_products[$id]['qty']++;
            
        $this->total();
        
        $this->emit('audio_play_success', true);
    }

    public function removeProduct($index)
    {
        unset($this->selected_products[$index]);
        $this->selected_products = array_values($this->selected_products);
        $this->total();
    }

    public function qtyInc($index)
    {
        $this->selected_products[$index]['qty']++;
        $this->total();
    }

    public function qtyDec($index)
    {
        if( $this->selected_products[$index]['qty'] > 1 )
            $this->selected_products[$index]['qty']--;
        $this->total();
    }

    public function cancel()
    {
        $this->selected_products = [];
        $this->total();
    }

    public function total()
    { 
        $this->total = 0;
        foreach($this->selected_products as $item)
            $this->total += $item['price'] * $item['qty'];
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
}
