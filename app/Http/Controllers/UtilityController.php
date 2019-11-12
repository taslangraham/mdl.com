<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Products;
use app\User;

class UtilityController extends Controller
{
    public static function countCustomers(){
        if (Auth::user()->hasRole('admin')){
            return count (User::role('customer')->get());
        }
    }

    public static function countProducts(){
        if (Auth::user()->hasRole('admin|clerk')){
            return count (Products::all());
        }
    }
}
