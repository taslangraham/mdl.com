<?php

namespace App\Http\Controllers;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class CustomerController extends Controller
{
    public function viewCart(){
        $cartItems = Auth::user()->cartItems()->get();
        return view('customer.cart', with(['cartItems'=>$cartItems]));
    }
}
