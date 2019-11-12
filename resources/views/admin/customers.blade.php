@extends('layouts.dashboard')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('title')
    Customers
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="panel">
                <div class="panael-body">
                    @if($customers === null)
                        There are no customers
                    @else
                        <table class="table table-hover table-responsive  table-striped" id="customersTable" border="0"
                               style="border: none">
                            <thead style="border: none">
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-center text-bold text-black-50" colspan="5"
                                    style="background-color: #f5f3e5"><h4>Address</h4></th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Street</th>
                                <th>Town/City</th>
                                <th>Parish</th>
                            
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->street}}</td>
                                    <td>{{$customer->town}}</td>
                                    <td>{{$customer->parish}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function () {
            $('#customersTable').DataTable({});

        });
    </script>
    @yield('scripts')
    <script src="{{asset('/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

@endsection