@extends('layouts.dashboard')
@section('title')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="btn-group">
            <a href="{{route('product.new')}}">
                <button class="btn btn-primary">Add Product</button>
            </a>
        </div>
    
       
      <div class="panel" style="margin-top: 15px;">
        <div class="panel-body">
            @if(count($products)>0)
        
                <table class="table table-hover table-responsive  table-striped" id="products-table" style="border:none;">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price e.a</th>
                        <th>Weight/Size</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price_per_unit}}</td>
                            <td>{{$product->weight}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <img
                                        class="img-fluid img-responsive img-thumbnail"
                                        src="{{asset($product->image_path.'/'.$product->image_name)}}"
                                        alt=""
                                        style="max-width: 40px; max-height: 40px; width: 40px; height: 40px;"
                                >
                            </td>
                            <td>
                               <div class="dbt-group">
                                   <a href="{{route('product.view',['id' => $product->id])}}">
                                       <button class="btn btn-primary">View</button>
                                   </a>
    
                               @role('admin')
                                   <a href="{{route('product.delete',['id' => $product->id])}}" onclick="return confirm('Are you sure?')">
                                       <button class="btn btn-danger">Delete</button>
                                   </a>
                                   @endrole
                               </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
        
        
                </table>
            @else
                <h1>No products found</h1>
            @endif
        </div>
      </div>
    
    </div>

    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
            
            });
            
        } );
    </script>
    @yield('scripts')
    <script src="{{asset('/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

 

@endsection


