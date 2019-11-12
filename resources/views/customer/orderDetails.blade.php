@extends('layouts.dashboard')

@section('title')
    Order/Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div>
                @if(count($orderItems) < 1)
                    <h2>Order Details not found</h2>
                   
                @else
                    <div class="card-body">
                        <div class="card-text text-center">
                            <h1> Details for Order #{{$orderId}}</h1>
                            <h5 class="text-danger">
                                <sub>Below is a list of all items on order #{{$orderId}}</sub>
                                <br>
                                <sub>Order made by {{$customer->name .' | '. $customer->email}}</sub>
                            </h5>
                        </div>
                        
                        <table class="table table-hover table-responsive table-striped">
                            <thead>
                            <tr class="thead-dark">
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach($orderItems as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                        <div class="btn btn-group">
                            <button class="btn btn-success" onclick=" window.history.back();">Back</button>
                        </div>
                    </div>
                
                @endif
            </div>
        </div>
    </div>
@endsection