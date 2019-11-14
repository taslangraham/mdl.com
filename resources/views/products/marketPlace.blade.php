@extends('layouts.app')

@section('title')
    Store
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')
    @if($products==null)
        <h1>We are currrently out of stock</h1>
    @else
        <div class="container-fluid">
            <div class="row">
                @foreach($products as $product)
                    <div class=" col-sm-3 mt-5">
                        <div class="card">
                        <div class="card-body" style="">
                            <div class="overlay">
                                <a href="{{route('product.singleProduct',['productId' => $product->id])}}">
                                    <img
                                            class="img img-responsive img-fluid card-img-top"
                                            src="{{asset($product->image_path. '/'. $product->image_name)}}"
                                            alt=""
                                            style="height: 200px;"
                                    >
                                </a>
                            </div>
                            
                            <div class="card-text">
                                <h3 class="mt-1"><strong>{{$product->name}}</strong></h3>
                                Price: ${{number_format($product->price_per_unit, 2)}} JMD | In
                                Stock: {{$product->quantity}}
                                <br>
                                Weight: {{number_format($product->weight, 2)}} lbs
                            </div>
                            <div class="btn-group">
                               
                                <a href=" {{route('product.singleProduct',['productId' => $product->id])}}"><button class="btn btn-warning" id="addToCartBtn">More</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                
            
            </div>
        </div>
    @endif

@endsection

