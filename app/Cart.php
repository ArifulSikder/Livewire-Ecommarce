<?php
namespace App;

use Illuminate\Support\Collection;

class Cart
{

  public static function add($product_data = [])
  {
      $product_id = $product_data['id'];

      $cart = self::content();

      // If cart is empty, then this is the first product
      if (!$cart) {
          $cart = [
            $product_id => 
              $product_data

              // below items from controller 
              // 'id' => $product->id,
              // 'name' => $product->name,
              // 'qty' => $product->quantity,
              // 'price' => $product->selling_price,
              // 'thumbnail' => $product->thumbnail
            
          ];
          session()->put('cart', $cart);
          return $cart;
      }

      // If cart is not empty, check if the product exists and increment the quantity
      if (isset($cart[$product_id])) {
        $cartItem = $cart[$product_id];
        $quantity = intval($cartItem['qty']);
        $productQty = intval($product_data['qty']);
        $updatedQuantity = $quantity + $productQty;
    
        $cartItem['qty'] = $updatedQuantity;
        $cart[$product_id] = $cartItem;
        
        session()->put('cart', $cart);
        return $cart;
      }

      // If item does not exist in the cart, add it with quantity = 1
      $cart[$product_id] = $product_data;

      session()->put('cart', $cart);

      return $cart;
  }

  
  public static function update($id, $qty)
  {
      $cart = session()->get('cart');

      $cartItem = $cart[$id];
      $quantity = intval($qty);
      $cartItem['qty'] = $quantity;
      $cart[$id] = $cartItem;
      
      session()->put('cart', $cart);
      return $cart;
  }
  
  public static function remove($id)
  {
    if($id) {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return response()->json($cart);
    }
  }

  public static function subtotal()
  {
      $subtotal = 0;
        if (session()->get('cart') != null) {
            foreach (session()->get('cart') as $product_data) {
                $quantity = $product_data['qty'];
                $price = $product_data['price'];
                $subtotal += $quantity * $price;
            }
        }
        return $subtotal;
  }

  public static function count()
  {
      $count = 0;
      if (session()->get('cart') != null) {
        foreach (session()->get('cart') as $product_data) {
            $count += $product_data['qty'];
        }
      }
      return $count;
  }

  public static function content()
  {
    if (session()->get('cart') === null) {
      return [];
    }
  
    return collect(session()->get('cart'));
  }
}
