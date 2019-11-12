<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public static function numberOfOrders()
    {
        return count(Order::all());
    }

    public function getCustomers()
    {
        return view('admin.customers', with([
            'customers'=> User::role('customer')->get()]
        ));
    }
}
