<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProductsController;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        $request = Request::capture();
        $product = Products::find($productId);

        $this->validateData($request, $product);

        if (ProductsController::isProductAvailable($productId, $request->quantity)) {
            if (ProductsController::reduceProductByQuantityAddedToCart($productId, $request->quantity)) {
                $this->store($request, $product);
            } else {
                Session::flash('error', 'Something went wrong');
                return http_redirect()->back();
            }
        } else {
            Session::flash('error', 'We don\'t have enough in stock');
            return redirect()->back();
        }

        Session::flash('success', 'Product added to cart');
        return redirect()->route('customer.cart');

    }

    public function validateData($request, $product)
    {
        $this->validate($request, [
            'quantity' => 'required|min:1 max:' . $product->quantity
        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($request, $product)
    {
        $cart = new CartItem();
        $cart->customer_id = Auth::user()->getAuthIdentifier();
        $cart->product_id = $product->id;
        $cart->quantity = $request->quantity;
        $cart->price_per_unit = $product->price_per_unit;
        $cart->total = $product->price_per_unit * $request->quantity;
        $cart->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function add($productId)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
