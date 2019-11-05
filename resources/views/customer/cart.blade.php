@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
         <div class="col col-sm-10 col-sm-offset-1">
             @if(count($cartItems)>0)
                 <table class="table table-hover table-striped" >
                     <thead style="background-color: #0a0a0a; color:white;">
                     <tr>
                         <th>Name</th>
                         <th>Quantity</th>
                         <th>Date Added</th>
                         <th>Price (JMD)</th>
                         <th>Total (JMD)</th>
                         <th>Action</th>
                     </tr>
                     </thead>
            
                     <tbody>
                     @foreach($artItems as $item)
                         <tr>
                             <td>{{$item->name}}</td>
                             <td>{{$item->quantity}}</td>
                             <td>{{\Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->toFormattedDateString()}}</td>
                             <td>{{ number_format($item->price_per_unit, 2)}}</td>
                             <td>{{ number_format($item->total, 2)}}</td>
                    
                             <td>
                                 <a href="">
                                     <button class="btn btn-primary">Edit</button>
                                 </a>
                                 <a href="">
                                     <button class="btn btn-danger">Remove</button>
                                 </a>
                             </td>
                
                
                         </tr>
                     @endforeach
                     <tr style="background-color: #4f424c">
                         <td style="color: red"><Strong>Total</Strong></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td style="color: white">
                             <?php
                             $sum = 0;
                             foreach ($cartItems as $item) {
                                 $sum += $item->total;
                             }
                             ?>
                             {{'$' . number_format($sum, 2) . ' JMD'}}
                         </td>
                     </tr>
                     </tbody>
                 </table>
                 <div class="col-6">
                     <a href="{{route('customer.submitOrder')}}">
                         <button class="btn btn-primary"> Submit Order</button>
                     </a>
                 </div>
             @else
                 <div class="col-sm-12 offset-0">
                     <h2>Your cart is empty.
                         <a href="/store">
                             Add items
                         </a>
                     </h2>
                 </div>
             @endif
         </div>
        </div>
    </div>
@endsection