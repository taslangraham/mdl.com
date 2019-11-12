@extends('layouts.dashboard')

@section('title')
    Product/New
@endsection
@section('content')
    <div class="container-fluid">
        
        <div class="row">
            <div class="card col col-lg-10 col-lg-offset-1 box-body" style=" background-color: white; border-radius: 25px">
                <div class="card-header"><h1 class="jumbotron-fluid">Add Product</h1>
                </div>
                
                <div class="card-body" >
                    @if (count($errors) > 0)
        
                        <div class="alert alert-danger">
            
                            <strong>Whoops!</strong> There were some problems with your input.
            
                            <ul>
                
                                @foreach ($errors->all() as $error)
                    
                                    <li>{{ $error }}</li>
                
                                @endforeach
            
                            </ul>
        
                        </div>
    
                    @endif
                    <form action="{{route('product.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
    
                        <div class="form-group">
                            <div class="col col-lg-6">
                                <label for="#name">Name</label>
                                <input class='form-control' id='name' type="text" name="name"
                                       placeholder="Product name" value="{{Request::old('name')}}">
                            </div>
                            <div class="col col-lg-3">
                                <label for="#name">Quantity</label>
                                <input class='form-control' id='quantity' type="number" min="1" name="quantity"
                                       placeholder="Quantity" value="{{Request::old('quantity')}}" >
                            </div>
                            
                            <div class="col col-lg-3">
                                <label for="price">Price</label>
                                <input class='form-control' id='price' type="number" min="1" name="price" value="{{Request::old('price')}}"
                                       placeholder="Price Per Unit">
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col col-lg-6">
                                <label for="weight">Weight (Pounds)</label>
                                <input type="number"  id="weight" class="form-control" min="0.1" name="weight" value="{{Request::old('weight')}}">
                            </div>
                            <div class="col col-lg-6">
                                <label for="image">Upload Image</label>
                                <input type="file" accept="image/x-png,image/jpeg" class="form-control col col-lg-6" name="image"  ">
                            </div>
                        </div>
                        
                        <div class="form-group" style="margin-top: 15px;">
                            <div class="col col-lg-12">
                                <label for="">Description</label>
                                <textarea class=" form-control" name="description"  >{{Request::old('description')}}</textarea>
                            </div>
                        
                        </div>
                        <br/>
                        
                        <div class="form-group">
                            <div class="col col-lg-4">
                                <button class="btn btn-warning" type="submit" style="margin-top: 15px;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


