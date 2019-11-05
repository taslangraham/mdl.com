<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function validateAddressAndmakePayment(Request $request)
    {
        $this->validate($request, [
            'town' => ['required', 'string', 'min:8'],
            'street' => ['required', 'string', 'min:8'],
            'parish' => ['required', 'string', 'min:8'],
        ]);

        $this->makeStripePayment($request->stripeToken);
        $address = (object)['town' => $request->town, 'street' => $request->street, 'parish' => $request->parish];
        $orderController = new OrderController();


        if(!$orderController->createOrder(Auth::user()->getAuthIdentifier(), $address)) {
            Session::flash('error', "Your cart is empty");
            return redirect()->route('customer.cart');
        }
            Session::flash('success', "Order successfully submitted");
            return redirect()->route('customer.cart');




    }

    private function makeStripePayment($stripeToken)
    {
        $secretKey = "sk_test_GEv6kp58S1XQw18oHx8DDnMN00uiI8UMUY";

        Stripe::setApiKey($secretKey);
        try {
            \Stripe\Charge::create(array(
                "amount" => Auth::user()->cartItems()->sum('cart_items.total') * 100,
                "currency" => "jmd",
                "source" => $stripeToken, // obtained with Stripe.js
                "description" => "Payment for purchases made on mdl.com"
            ));

        } catch (\Exception $e) {
            Session::flash('error', "Error! Please Try again.");
            return redirect()->back();
        }
    }


}
