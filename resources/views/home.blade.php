@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('customer')
                        <h1>Customer features/options goes here</h1>
                    @endrole



                    @role('admin')
                        <h1>Admin</h1>
                    @endrole

                    @role('clerk')
                        <h1>Clerk</h1>        
                    @endrole        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
