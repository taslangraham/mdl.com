<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Order;
use App\Products;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class CustomerController extends Controller
{
    public function viewCart()
    {
        $user = Auth::user();
        $cartItems = DB::table('cart_items')
            ->join('products', 'products.id', '=', 'cart_items.product_id')->where('cart_items.customer_id', '=', $user->id)
            ->select(
                'products.name as name',
                'products.description as product_description',
                'cart_items.quantity',
                'cart_items.price_per_unit',
                'cart_items.total as total',
                'cart_items.created_at',
                'cart_items.id'
            )
            ->get();

        return view('customer.cart', with(['cartItems' => $cartItems]));
    }


    public function submitOrder()
    {

        return view('payment.stripePaymentForm', with([
            'total' => $this->getCartTotalBalance()
        ]));
    }

    public static function getCartTotalBalance()
    {
        return Auth::user()->cartItems()->sum('cart_items.total');
    }

    public static function hasCartItems()
    {
        return Auth::user()->cartItems()->count();
    }


    public function orders()
    {
        $orders = new OrderController();
        $allOrders = $orders->getOrdersByCustomerId(Auth::user()->getAuthIdentifier());
        return view('customer.orders', with(['orders' => $allOrders]));
    }

    public function orderDetails($orderId, $customerId)
    {
        $orderItems = OrderController::getOrderItemsByOrderId($orderId, $customerId);
        return view('customer.orderDetails', with([
            'orderItems' => $orderItems,
            'orderId' => $orderId,
            'customer' => User::find($customerId)
        ]));
    }

    public static function validateAddressForDelivery($street, $town, $parish)
    {
        return $street === "" || $town === "" || $parish === "";
    }

    public function removerCartItem($itemId)
    {
        try {
            $item = CartItem::find($itemId);
            $product = Products::find($item->product_id);
            $this->addProductBackToProducts($product, $item->quantity);
            $item->delete();
            Session::flash('success', 'Item Successfully removed from cart');
            return redirect()->route('customer.cart');

        } catch (\Exception $error) {
            Session::flash('error', 'Something went wrong. Please try again');
            return redirect()->route('customer.cart');
        }
    }

    public function addProductBackToProducts($product, $quantity)
    {
        $product->quantity += $quantity;
        $product->save();
    }

}
