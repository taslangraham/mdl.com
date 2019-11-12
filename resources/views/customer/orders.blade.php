@extends('layouts.dashboard')
@section('title')
    Orders
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(count($orders) < 1)
                <h2>No orders</h2>
            @else
            <div class="panel panel-body">
                <div class="text-center">
                    <h2> Here's a list of all your orders</h2>
                </div>
                <br>
                <table class="table table-striped table-bordered mt-5">
                    <thead class="">
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Delivery Address</th>
                        <th>Cost</th>
                        <th>Delivered</th>
                        <th></th>
                    </tr>
                    </thead>
        
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->toFormattedDateString()}}</td>
                            <td>{{$order->delivery_address}}</td>
                            <td>{{$order->total_cost}}</td>
                            <td style="background-color:{{$order->is_delivered?'Green':'Red'}}">{{$order->is_delivered?'Yes':'No'}}</td>
                            <td><a href="{{route('customer.order.details', ['orderId' => $order->id, 'customerId'=>Auth::user()->id])}}">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
    
                </table>
            </div>
            @endif
        </div>
    </div>
@endsection