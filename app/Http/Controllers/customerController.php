<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class customerController extends Controller
{
    public function showCustomer()
    {
    	$customer = Customer::all();
    	return view('pages.ListCustomer', compact('customer'));
    }
}
