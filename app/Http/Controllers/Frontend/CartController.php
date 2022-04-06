<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\CartDetails;
use App\Models\Product;


class CartController extends Controller
{
    private string $return_url = "/sepetim";

    public function index()
    {
        $cart = $this->getOrCreateCart();
        return view("frontend.cart.index", ["cart" => $cart]);
    }

    /**
     *
     * Lists the cart content
     *
     * @return Cart
     */
    private function getOrCreateCart()
    {
        $user = Auth::user();
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->user_id, 'is_active' => true],
            ['code' => Str::random(8)]
        );
        return $cart;
    }

    /**
     * Add product as cart detail
     *
     * @param Product $product
     * @param int $quantity
     * @return RedirectResponse
     */
    public function add(Product $product, int $quantity = 1)
    {
        $cart = $this->getOrCreateCart();
        $cart->details()->create([
            "product_id" => $product->product_id,
            "quantity" => $quantity,
        ]);

        return redirect($this->return_url);
    }

    /**
     *
     * Remove cart detail from cart
     *
     * @param CartDetails $cartDetails
     * @return RedirectResponse
     */
    public function remove(CartDetails $cartDetails)
    {
        $cartDetails->delete();
        return redirect($this->return_url);
    }
}
