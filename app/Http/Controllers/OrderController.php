<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;

use App\Order;
use App\OrderItem;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function createOrder($customerId, $address)
    {
        if (CustomerController::hasCartItems() < 1) {
            return false;
        } {
            $user = User::find($customerId);
            $totalCost = CustomerController::getCartTotalBalance();

            $order = new Order();
            $order->customer_id = $user->id;
            $order->total_cost = $totalCost;
            $order->delivery_address = $address->street . ' ' . $address->town . ' ' . $address->parish;
            $order->is_delivered = false;
            $order->save();
            $cartItems = $user->cartItems()->get();
            $this->addItemToOrderItem($order->id, $cartItems);
            $this->emptyCart($user->id);
            return true;
        }
    }

    function addItemToOrderItem($orderId, $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->order_id = $orderId;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price_per_unit = $cartItem->price_per_unit;
            $orderItem->total = $cartItem->total;
            $orderItem->save();
        }
    }

    private function emptyCart($userId)
    {
        $items = CartItem::where('customer_id', '=', $userId);
        $items->delete();
    }

    public function getOrdersByCustomerId($customerId)
    {


        $orders = Order::where('customer_id', '=', $customerId)->get();
        return $orders;
    }

    public static function getOrderItemsByOrderId($orderId, $customerId)
    {
        $orders = DB::table('orders')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.customer_id', '=', $customerId)
            ->where('orders.id', '=', $orderId)
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'order_items.quantity',
                'order_items.price_per_unit as price',
                'order_items.total',
                'name',
                'description',
                'orders.id as order_id'
            )
            ->get();

        return $orders;
    }


    public function getAllOrders()
    {
        $orders = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.id', 'users.name', 'users.email', 'orders.total_cost', 'orders.is_delivered', 'orders.customer_id')
            ->get();
        //dd($orders);
        return view('orders.orders', with(['orders' => $orders]));
    }


    public function updateOrderStatus($orderId)
    {
        $isDelivered = true;
        $notDelivered = false;

        $order = Order::find($orderId);
        if ($order !== null) {
            $order->is_delivered = $order->is_delivered === $notDelivered ? $isDelivered : $notDelivered;
            $order->save();
            Session::flash('success', 'Successfully updated order status');
            return redirect()->back();
        }

        Session::flash('error', 'Order not found');
        return redirect()->back();
    }
}
