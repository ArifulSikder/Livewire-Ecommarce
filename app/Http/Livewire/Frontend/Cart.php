<?php

namespace App\Http\Livewire\Frontend;
use App\Cart as MyCart;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Cart extends Component
{
    public $contents;
    public $quantity;
    public $state = [];
    protected $listeners =['myCart'];

    public function decrease($id, $qty)
    {
        MyCart::update($id, $qty- 1);
        $this->emit('count');
        $this->contents = MyCart::content();
    }
    public function increase($id, $qty)
    {
        MyCart::update($id, $qty+ 1);
        $this->emit('count');
        $this->contents = MyCart::content();
    }

    public function checkout()
    {
        $validateData = Validator::make($this->state, [
            "country" => "required|string|max:256",
            "state" => "required|string|max:256",
            "postal_code" => "required|string|max:256",
            "payment_method" => "required|integer",
        ])->validate();

        $order = Order::create($validateData);

        if ($order) {
            $this->reset();
            $this->emit("order_done");
            return redirect('/');
        }
    }

    public function myCart()
    {
        $this->contents = MyCart::content();
    }

    public function render()
    {
        $this->contents = MyCart::content();
        return view('livewire.frontend.cart');
    }
}
