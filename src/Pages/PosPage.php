<?php

namespace IbrahimBougaoua\FilamentPos\Pages;

use IbrahimBougaoua\FilamentPos\Models\Category;
use IbrahimBougaoua\FilamentPos\Models\Order;
use IbrahimBougaoua\FilamentPos\Models\Product;
use Illuminate\Contracts\View\View;
use Filament\Pages\Page;
use Illuminate\Support\Arr;

class PosPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $layout = 'filament-pos::components.layouts.app';

    protected static string $view = 'filament-pos::pages.pos-page';
    
    public $currency = "DA";

    public $subtotal = 0;

    public $discount = 0;

    public $tax = 0;

    public $total = 0;

    public $search = "";

    public $searchModel = "";

    public $categories = [];

    public $products = [];

    public $variations = [];
    
    public $selected_products = [];

    public $hold_selected_products = [];

    public $orders = [];

    public function mount()
    {
        $this->categories = Category::limit(6)->get();
        $this->all_products();
        $this->all_orders();
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
    
    public function all_orders()
    {
        $this->orders = Order::all();
    }

    public function all_products()
    {
        $this->products = Product::all();
    }

    public function get_variations($product_id)
    {
        $product = Product::find($product_id);

        if($product)
        {
            $this->variations = $product->variations;
        }
    }

    public function addProduct($id,$name,$image,$price,$description,$qty,$has_variations)
    {
        $this->get_variations($id);

        if( ! Arr::has($this->selected_products, $id) )
        {
            $this->selected_products[$id] = [
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'description' => $description,
                'qty' => $qty,
                'variations' => [

                ]
            ];
        } else {
            if( $has_variations )
            {
                $value = [
                    'id' => $id,
                    'name' => $name,
                    'image' => $image,
                    'price' => $price,
                    'description' => $description,
                    'qty' => $qty,
                ];
                array_push($this->selected_products[$id]['variations'], $value);
            } else {
                $this->selected_products[$id]['qty']++;
            }
        }

        $this->total();

        $this->emit('audio_play_success', true);
    }

    public function removeProduct($index)
    {
        unset($this->selected_products[$index]);
        $this->selected_products = array_values($this->selected_products);
        $this->total();
    }

    public function removeVariation($id,$index)
    {
        unset($this->selected_products[$id]['variations'][$index]);
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
    
    public function add_to_hold_list()
    {
        if( count($this->selected_products) > 0 )
        {
            array_push($this->hold_selected_products,$this->selected_products);
            $this->cancel();
        } else {
            $this->emit('error', 'Please select an item !');
        }
    }
    
    public function hold_out_from_hold_list($key)
    {
        if( count($this->hold_selected_products) > 0 )
        {
            if( count($this->selected_products) == 0 )
            {
                $this->selected_products = $this->hold_selected_products[$key];
                $this->removeHoldList($key);
                $this->total();
            }
        }
    }
    
    public function removeHoldList($index)
    {
        unset($this->hold_selected_products[$index]);
        $this->hold_selected_products = array_values($this->hold_selected_products);
    }
    
    public function removeHoldListItem($id,$index)
    {
        unset($this->hold_selected_products[$id][$index]);
        $this->hold_selected_products = array_values($this->hold_selected_products);
    }

    protected function getHeader(): ?View
    {
        return view('filament-pos::components.layouts.header',[
            'hold_selected_products' => $this->hold_selected_products,
            'orders' => $this->orders
        ]);
    }
    
    protected function getFooter(): ?View
    {
        return view('filament-pos::components.layouts.footer');
    }
    
    public function submit()
    {
        try
        {
            if( count($this->selected_products) > 0 )
            {
                $order = Order::create([
                    "ref_amount" => 0,
                    "service_charge" => 0,
                    "discount" => 0,
                    "order_bill" => 0,
                    "vat" => 0,
                    "vat_system" => 0,
                    "cgst" => 0,
                    "sgst" => 0,
                    "total_payable" => 0,
                    "bill_distribution" => 0,
                    "paid_amount" => 0,
                    "return_amount" => 0,
                    "is_paid" => false,
                    "customer_id" => 1
                ]);
        
                foreach ($this->selected_products as $productData) {
                    $order->items()->create([
                        "payment_method" => "Cash",
                        "qty" => 0,
                        "price" => 0,
                        "product_id" => 1
                    ]);
                }
                
                $this->cancel();

                $this->emit('success', 'Order has been approved');
            } else {
                $this->emit('error', 'Please select an item !');
            }
        } catch(\ErrorException $err)
        {
            // Error Swal event
        }

    }
}
