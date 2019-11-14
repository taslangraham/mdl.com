@extends('layouts.app')

@section('title')
    Product/Add to cart
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col col-6">
                <div class="row">
                    <div class="card-body col-7">
                        <div class="card-img">
                            <img
                                    src="{{asset($product->image_path.'/'.$product->image_name)}}"
                                    alt=""
                                    class="img-responsive img-fluid"
                            
                            >
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="card-text">
                            <p><strong>{{$product->name}}</strong></p> <br>
                            <p>{{'Price: $' . number_format($product->price_per_unit, 2) . ' JMD | Weight: '. $product->weight .' lbs'}}</p>
                            <br>
                            <p style="line-break: auto">Description: {{$product->description}}</p> <br>
                            <p>{{'In stock: '. $product->quantity}}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{--order form--}}
            <div class="col col-6" style="border-left:solid black;">
                @if($product->quantity>0)
                    <form action="{{route('addToCart', ['productId'=>$product->id])}}" method="post" id="AddToCartForm">
                        @csrf
                        
                        <div class="col-form-label">
                            <h2 class="justify-content-left">Add To Cart</h2>
                        </div>
                        
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number"
                                   id="desiredQuantity"
                                   value="0" pattern="[0-9]"
                                   class="form-control @error('quantity') is-invalid @enderror"
                                   min="1"
                                   max="{{$product->quantity}}"
                                   name="quantity"
                            >
                            
                            @error('quantity')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ 'Please select quantity ranging from 1 - '. $product->quantity }}</strong>
                        </span>
                            @enderror
                        
                        </div>
                        
                        <div class="form-group">
                            <label for="price">Cost</label>
                            <p class="form-control" id="totalPrice">0</p>
                            <input type="number" name="price" id="priceInputTag" hidden>
                        </div>
                        
                        {{--<div class="form-group">--}}
                        {{--<label for="">Delivery Address</label>--}}
                        {{--<br>--}}
                        {{--<input type="checkbox" value="sameAddressCheckbox" id="sameAddressCheckbox"> same as home--}}
                        {{--address--}}
                        {{----}}
                        {{--<div id="addressBlock" >--}}
                        {{----}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="btn-group">
                            <button class="btn btn-warning">Add To cart</button>
                        </div>
                    </form>
                @else
                    <h2>Out Of Stock</h2>
                @endif
                
            </div>
        
        </div>
    </div>
@endsection

@section('scripts')
    {{--<script>--}}
    {{--addAddressFields();--}}
    {{--function addAddressFields() {--}}
    {{--const street = `<input type="text" placeholder="Street" name='street' class='form-control'> <br>`;--}}
    {{--const town = `<input type="text" placeholder="Town/City" name="town" class="form-control"><br>`;--}}
    {{--const parish = ` <input type="text" placeholder="Parish" name="parish" class="form-control">`;--}}
    {{--document.getElementById('addressBlock').innerHTML = street + town + parish;--}}
    {{--}--}}
    {{----}}
    {{--const removeAddressFields = ()=>document.getElementById('addressBlock').innerHTM="";--}}
    {{--removeAddressFields();--}}
    
    {{--</script>--}}
    
    
    <script type="text/javascript">
        $(document).ready(() => {
            function calculatePrice() {
                $("#desiredQuantity").on("input change", function (event) {
                    let quantity = event.target.value;
                    let total ={{$product->price_per_unit}}*
                    quantity;
                    $("#totalPrice").text(total);

                });
            }

            calculatePrice();


            const checkQuantity = () => {
                $("#AddToCartForm").submit(function (event) {
                    if ($("#desiredQuantity").val() < 1)return false;
                });
            }
            checkQuantity();
        });
    
    
    </script>
@endsection