@extends('layouts.dashboard')

@section('content')
    @role('customer')
        <div class=''>
            
            <h1 class='col-lg-3' style="border: solid black">
               customer  content goes here2
            </h1>
            
            
            <h1 class='col-lg-3' style="border: solid black">
                content goes here
            </h1>
        
        
        </div>
    @endrole


    @role('admin')
  
    @endrole



    @role('clerk')
    <div class=''>
    
        <h1 class='col-lg-3' style="border: solid black">
            clerk content goes here2
        </h1>
    
    
        <h1 class='col-lg-3' style="border: solid black">
            content goes here
        </h1>


    </div>
    @endrole
@endsection


