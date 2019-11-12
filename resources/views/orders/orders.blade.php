@extends('layouts.dashboard')
@section('title')
    Orders
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    @if(count($orders) > 0)
                        <table class="table table-hover table-responsive  table-striped" id="orders-table">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Total</th>
                                <th>Delivered</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->total_cost}}</td>
                                    
                                    @if($order->is_delivered)
                                        <td class="text-success"><i class="fa fa-check"></i></td>
                                    @else
                                        <td>
                                            <form action="{{route('order.update.status', ['orderId'=> $order->id])}}" method="post">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <button class="btn btn-danger"><i class="fa fa-times"></i><span> Click to change</span>
                                                </button>
                                            </form>
                                           
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{route('order.details', ['orderId' => $order->id, 'customerId'=>$order->customer_id])}}">View</a>                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#orders-table').DataTable({});

        });
    </script>
    @yield('scripts')
    <script src="{{asset('/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
@endsection