<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\Auth;
use Session;
use app\User;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products/index', with([
            'products' => Products::all()
        ]));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.newProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required|max:256',
            "quantity" => 'required|min:1',
            "price" => 'required|min:1',
            "weight" => 'required|min:0.1',
            "image" => 'required|mimes:jpg,png,JPG,PNG,jpeg,JPEG|max:100000',
            "description" => 'required'
        ]);
        $this->saveProduct($request);
        Session::flash('success', 'Successfully Added product');
        return redirect()->route('products');
    }


    private function saveProduct($request)
    {

        $imageName = $this->storeImageAndReturnImageName($request->image);

        $product = new Products();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price_per_unit = $request->price;
        $product->weight = $request->weight;
        $product->image_name = $imageName;
        $product->description = $request->description;
        $product->image_path = $this->getImageBasePath();
        $product->added_by = Auth::user()->getAuthIdentifier();
        $product->save();
    }

    private function storeImageAndReturnImageName($image)
    {
        $size = $image->getSize();
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($this->getImageBasePath()), $imageName);
        return $imageName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.edit', with([
            'product' => Products::find($id)
        ]));
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
    public function update($id)
    {
        $request = Request::capture();

        $this->validate($request, [
            "name" => 'required|max:256',
            "quantity" => 'required|min:1',
            "price" => 'required|min:1',
            "weight" => 'required|min:0.1',
            "description" => 'required'
        ]);

        if ($request->image) {
            $this->validate($request, [
                "image" => 'required|mimes:jpg,png,JPG,PNG,jpeg,JPEG|max:100000',
            ]);
        }

        $product = Products::find($id);
        $product->name = $request->name;
        $product->quantity = 400;
        $product->price_per_unit = $request->price;
        $product->weight = $request->weight;
        $product->description = $request->description;

        if ($request->image) {
//            dd($request->image);
            $imageName = $this->storeImageAndReturnImageName($request->image);
            $product->image_name = $imageName;
            $product->image_path = $this->getImageBasePath();
        }

        $product->update();
        Session::flash('success', 'Successfully updated product');
        return redirect()->route('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();

        Session::flash('success', 'Successfully deleted product');
        return redirect()->route('products');
    }


    public function all()
    {
        $products = Products::all();
//        dd(count($products));
        return view('products.marketPlace', with(['products' => $products]));
    }


    public function getProductById($id)
    {
        $product = Products::find($id);
        if ($product === null) {
            Session::flash('error', 'Product not found');
            return redirect()->back();
        } else {
            return view('products.productInfoAndAddToCart', with(['product' => $product]));

        }

    }

    public static function isProductAvailable($productId, $quantity)
    {
        $product = Products::find($productId);
        return $product->quantity >= $quantity ? true : false;
    }

    public static function reduceProductByQuantityAddedToCart($productId, $quantity)
    {
        $product = Products::find($productId);
        if ($product != null) {
            $product->quantity -= $quantity;
            return $product->save() ? true : false;
        }
    }

    public function getImageBasePath()
    {
        return "images/products";
    }


}
