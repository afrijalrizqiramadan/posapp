<?php

namespace App\Livewire\Pos;

use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Checkout extends Component
{

    public $listeners = ['productSelected', 'discountModalRefresh'];

    public $cart_instance;
    public $customers;
    public $global_discount;
    public $global_tax;
    public $shipping;
    public $quantity;
    public $check_quantity;
    public $discount_type;
    public $item_discount;
    public $data;
    public $customer_id;
    public $total_amount;

    public function mount($cartInstance, $customers)
    {
        $this->cart_instance = $cartInstance;
        $this->customers = $customers;
        $this->global_discount = 0;
        $this->global_tax = 0;
        $this->shipping = 0.00;
        $this->check_quantity = [];
        $this->quantity = [];
        $this->discount_type = [];
        $this->item_discount = [];
        $this->total_amount = 0;
    }

    public function hydrate()
    {
        $this->total_amount = $this->calculateTotal();
    }

    public function render()
    {
        $cart_items = Cart::instance($this->cart_instance)->content();

        return view('livewire.pos.checkout', [
            'cart_items' => $cart_items
        ]);
    }

    public function proceed()
    {
        if ($this->customer_id != null) {
            $this->dispatch('showCheckoutModal');
        } else {
            $this->customer_id=1;
            $this->dispatch('showCheckoutModal');
            // session()->flash('message', 'Pilih Pelanggan Terlebih Dahulu');
        }
    }

    public function calculateTotal()
    {
        return Cart::instance($this->cart_instance)->total() + $this->shipping;
    }

    public function resetCart()
    {
        Cart::instance($this->cart_instance)->destroy();
    }

    public function productSelected($product)
    {
        $cart = Cart::instance($this->cart_instance);

        // $exists = $cart->search(function ($cartItem, $rowId) use ($product) {
        //     return $cartItem->id == $product['id'];
        // });
        $exists = $cart->search(function ($cartItem) use ($product) {
            return $cartItem->id == $product['id'];
        });    
        if ($exists->count()) {
            session()->flash('message', 'Produk Tersedia di Keranjang');
            return;
        }
        $calculated = $this->calculate($product);

        // if ($exists->isNotEmpty()) {
        //     session()->flash('message', 'Produk Tersedia di Keranjang');

        //     return;
        // }

        $cart->add([
            'id'      => $product['id'],
            'name'    => $product['product_name'],
            'qty'     => 1,
            'price'   => $calculated['price'],
            'weight'  => 1,
            'options' => [
                'price1' => $calculated['price'],
                'price2' => $calculated['price2'],
                'product_discount'      => 0.00,
                'product_discount_type' => 'fixed',
                'sub_total'             => $calculated['sub_total'],
                'code'                  => $product['product_code'],
                'stock'                 => $product['product_quantity'],
                'unit'                  => $product['product_unit'],
                'product_tax'           => $calculated['product_tax'],
                'unit_price'            => $calculated['unit_price'],
            ]
        ]);

        $this->check_quantity[$product['id']] = $product['product_quantity'];
        $this->quantity[$product['id']] = 1;
        $this->discount_type[$product['id']] = 'fixed';
        $this->item_discount[$product['id']] = 0;
        
        $this->total_amount = $this->calculateTotal();
    }

    public function removeItem($rowId)
    {
        try {
            // Ambil instance keranjang
            $cart = Cart::instance($this->cart_instance);
    
            // Periksa apakah item dengan `rowId` yang diberikan ada di keranjang
            $cartItem = $cart->get($rowId);
            if ($cartItem) {
                // Hapus item dari keranjang
                $cart->remove($rowId);
    
                // Catat informasi item yang dihapus dan isi keranjang setelah penghapusan
                info("Item with rowId {$rowId} removed successfully.");
                info('Updated cart content:', $cart->content()->toArray());
            } else {
                // Log jika item tidak ditemukan
                info("Item with rowId {$rowId} not found.");
            }
        } catch (Exception $e) {
            // Tangani error dan catat log error
            info("Error removing item: " . $e->getMessage());
        }
    }

    public function updatePrice($rowId, $newPrice)
    {
        Cart::instance($this->cart_instance)->update($rowId, [
            'price' => $newPrice,
        ]);

        // Optionally, recalculate totals or trigger additional logic
    }

    public function updatedGlobalTax()
    {
        Cart::instance($this->cart_instance)->setGlobalTax((int)$this->global_tax);
    }

    public function updatedGlobalDiscount()
    {
        Cart::instance($this->cart_instance)->setGlobalDiscount((int)$this->global_discount);
    }

    public function updateQuantity($rowId, $product_id)
    {
        if ($this->check_quantity[$product_id] < $this->quantity[$product_id]) {
            session()->flash('message', 'Jumlah yang Diminta Tidak Tersedia Dalam Stok');

            return;
        }

        Cart::instance($this->cart_instance)->update($rowId, $this->quantity[$product_id]);

        $cart_item = Cart::instance($this->cart_instance)->get($rowId);

        // Cart::instance($this->cart_instance)->update($rowId, [
        //     'options' => [
        //         'sub_total'             => $cart_item->price * $cart_item->qty,
        //         'code'                  => $cart_item->options->code,
        //         'stock'                 => $cart_item->options->stock,
        //         'unit'                  => $cart_item->options->unit,
        //         'product_tax'           => $cart_item->options->product_tax,
        //         'unit_price'            => $cart_item->options->unit_price,
        //         'product_discount'      => $cart_item->options->product_discount,
        //         'product_discount_type' => $cart_item->options->product_discount_type,
        //     ]
        // ]);
    }

    public function updatedDiscountType($value, $name)
    {
        $this->item_discount[$name] = 0;
    }

    public function discountModalRefresh($product_id, $row_id)
    {
        $this->updateQuantity($row_id, $product_id);
    }

 public function setProductDiscount($row_id, $product_id)
    {
        $cart_item = Cart::instance($this->cart_instance)->get($row_id);

        if ($this->discount_type[$product_id] == 'fixed') {
            Cart::instance($this->cart_instance)
                ->update($row_id, [
                    'price' => ($cart_item->price + $cart_item->options->product_discount) - $this->item_discount[$product_id]
                ]);

            $discount_amount = $this->item_discount[$product_id];

            $this->updateCartOptions($row_id, $product_id, $cart_item, $discount_amount);
        } elseif ($this->discount_type[$product_id] == 'percentage') {
            $discount_amount = ($cart_item->price + $cart_item->options->product_discount) * ($this->item_discount[$product_id] / 100);

            Cart::instance($this->cart_instance)
                ->update($row_id, [
                    'price' => ($cart_item->price + $cart_item->options->product_discount) - $discount_amount
                ]);

            $this->updateCartOptions($row_id, $product_id, $cart_item, $discount_amount);
        }

        session()->flash('discount_message' . $product_id, 'Diskon Ditambah ke Produk!');
    }

    public function calculate($product)
    {
        $price = 0;
        $unit_price = 0;
        $product_tax = 0;
        $sub_total = 0;


        // $product_price = $this->customer_id == 1 || $this->customer_id === null ? $product['product_price'] : $product['product_price2'];
        $product_price = $product['product_price'];
        $product_price2 = $product['product_price2'];

        if ($product['product_tax_type'] == 1) {
            $price = $product_price + ($product_price * ($product['product_order_tax'] / 100));
            $unit_price = $product_price;
            $product_tax = $product_price * ($product['product_order_tax'] / 100);
            $sub_total = $product_price + ($product_price * ($product['product_order_tax'] / 100));
        } elseif ($product['product_tax_type'] == 2) {
            $price = $product_price;
            $unit_price = $product_price - ($product_price * ($product['product_order_tax'] / 100));
            $product_tax = $product_price * ($product['product_order_tax'] / 100);
            $sub_total = $product_price;
        } else {
            $price = $product_price;
            $unit_price = $product_price;
            $product_tax = 0.00;
            $sub_total = $product_price;
        }

        return ['price' => $product_price, 'price2' => $product_price2, 'unit_price' => $unit_price, 'product_tax' => $product_tax, 'sub_total' => $sub_total];

        // if ($product['product_tax_type'] == 1) {
        //     $price = $product['product_price'] + ($product['product_price'] * ($product['product_order_tax'] / 100));
        //     $unit_price = $product['product_price'];
        //     $product_tax = $product['product_price'] * ($product['product_order_tax'] / 100);
        //     $sub_total = $product['product_price'] + ($product['product_price'] * ($product['product_order_tax'] / 100));
        // } elseif ($product['product_tax_type'] == 2) {
        //     $price = $product['product_price'];
        //     $unit_price = $product['product_price'] - ($product['product_price'] * ($product['product_order_tax'] / 100));
        //     $product_tax = $product['product_price'] * ($product['product_order_tax'] / 100);
        //     $sub_total = $product['product_price'];
        // } else {
        //     $price = $product['product_price'];
        //     $unit_price = $product['product_price'];
        //     $product_tax = 0.00;
        //     $sub_total = $product['product_price'];
        // }

        return ['price' => $price, 'unit_price' => $unit_price, 'product_tax' => $product_tax, 'sub_total' => $sub_total];
    }

    public function updateCartOptions($row_id, $product_id, $cart_item, $discount_amount)
    {
        Cart::instance($this->cart_instance)->update($row_id, ['options' => [
            'sub_total'             => $cart_item->price * $cart_item->qty,
            'code'                  => $cart_item->options->code,
            'stock'                 => $cart_item->options->stock,
            'unit'                 => $cart_item->options->unit,
            'product_tax'           => $cart_item->options->product_tax,
            'unit_price'            => $cart_item->options->unit_price,
            'product_discount'      => $discount_amount,
            'product_discount_type' => $this->discount_type[$product_id],
        ]]);
    }
}
